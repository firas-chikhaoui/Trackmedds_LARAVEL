<?php

namespace App\Repositories\Backend\Mypharmacies;

use DB;
use Carbon\Carbon;
use App\Models\Mypharmacies\Mypharmacy;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MypharmacyRepository.
 */
class MypharmacyRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Mypharmacy::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()->with('livrer')
            ->leftjoin('users as livrer', 'livrer.id', '=', config('module.mypharmacies.table').'.user')
            ->select([
                config('module.mypharmacies.table').'.id',
                config('module.mypharmacies.table').'.adress',
                config('module.mypharmacies.table').'.ville',
                config('module.mypharmacies.table').'.amplitude',
                config('module.mypharmacies.table').'.attitude',
                config('module.mypharmacies.table').'.nom',
                config('module.mypharmacies.table').'.created_at',
                config('module.mypharmacies.table').'.updated_at',
                'livrer.first_name as livrer_name',
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
        if (Mypharmacy::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.mypharmacies.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Mypharmacy $mypharmacy
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Mypharmacy $mypharmacy, array $input)
    {
    	if ($mypharmacy->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.mypharmacies.update_error'));
    }

}
