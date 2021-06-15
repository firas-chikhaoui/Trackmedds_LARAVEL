<?php

namespace App\Repositories\Backend\Stocks;

use DB;
use Carbon\Carbon;
use App\Models\Stocks\Stock;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StockRepository.
 */
class StockRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Stock::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.stocks.table').'.id',
                config('module.stocks.table').'.nompharmacie',
                config('module.stocks.table').'.nomproduit',
                config('module.stocks.table').'.quantite',
                config('module.stocks.table').'.created_at',
                config('module.stocks.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Stock::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.stocks.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Stock $stock
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Stock $stock, array $input)
    {
    	if ($stock->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.stocks.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Stock $stock
     * @throws GeneralException
     * @return bool
     */
    public function delete(Stock $stock)
    {
        if ($stock->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.stocks.delete_error'));
    }
}
