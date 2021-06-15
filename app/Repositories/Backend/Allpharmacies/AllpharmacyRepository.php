<?php

namespace App\Repositories\Backend\Allpharmacies;

use DB;
use Carbon\Carbon;
use App\Models\Allpharmacies\Allpharmacy;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AllpharmacyRepository.
 */
class AllpharmacyRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Allpharmacy::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
        ->leftjoin('users as livrer', 'livrer.id', '=', config('module.mypharmacies.table').'.user')
            ->select([
                config('module.allpharmacies.table').'.id',
                config('module.allpharmacies.table').'.adress',
                config('module.allpharmacies.table').'.ville',
                config('module.allpharmacies.table').'.amplitude',
                config('module.allpharmacies.table').'.attitude',
                config('module.allpharmacies.table').'.nom',
                config('module.allpharmacies.table').'.created_at',
                config('module.allpharmacies.table').'.updated_at',
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
        if (Allpharmacy::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.allpharmacies.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Allpharmacy $allpharmacy
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Allpharmacy $allpharmacy, array $input)
    {
    	if ($allpharmacy->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.allpharmacies.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Allpharmacy $allpharmacy
     * @throws GeneralException
     * @return bool
     */
    public function delete(Allpharmacy $allpharmacy)
    {
        if ($allpharmacy->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.allpharmacies.delete_error'));
    }
}
