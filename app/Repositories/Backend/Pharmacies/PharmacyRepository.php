<?php

namespace App\Repositories\Backend\Pharmacies;

use DB;
use Carbon\Carbon;
use App\Models\Pharmacies\Pharmacy;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PharmacyRepository.
 */
class PharmacyRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Pharmacy::class;

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
                config('module.pharmacies.table').'.id',
                config('module.pharmacies.table').'.nompharmacie',
                config('module.pharmacies.table').'.adressepharmacie',
                config('module.pharmacies.table').'.numerotel',
                config('module.pharmacies.table').'.amplitude',
                config('module.pharmacies.table').'.altitude',
                config('module.pharmacies.table').'.created_at',
                config('module.pharmacies.table').'.updated_at',
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
        if (Pharmacy::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.pharmacies.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Pharmacy $pharmacy
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Pharmacy $pharmacy, array $input)
    {
    	if ($pharmacy->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.pharmacies.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Pharmacy $pharmacy
     * @throws GeneralException
     * @return bool
     */
    public function delete(Pharmacy $pharmacy)
    {
        if ($pharmacy->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.pharmacies.delete_error'));
    }
}
