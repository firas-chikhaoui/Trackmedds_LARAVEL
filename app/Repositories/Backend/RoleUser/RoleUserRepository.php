<?php

namespace App\Repositories\Backend\RoleUser;

use DB;
use Carbon\Carbon;
use App\Models\RoleUser\RoleUser;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleUserRepository.
 */
class RoleUserRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = RoleUser::class;

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
                config('module.roleusers.table').'.id',
                config('module.roleusers.table').'.created_at',
                config('module.roleusers.table').'.updated_at',
            ]);
    }

}
