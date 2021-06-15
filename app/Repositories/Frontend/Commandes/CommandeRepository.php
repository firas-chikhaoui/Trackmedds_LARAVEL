<?php

namespace App\Repositories\Frontend\Commandes;

use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Models\Commandes\Commande;


/**
 * Class CommandeRepository.
 */
class CommandeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Commande::class;

    /*
    * Find commande by id
    */
    public function getForDataTable()

    {
        return $this->query()
            ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.commandes.table').'.created_by')
            ->select([
                config('module.commandes.table').'.id',
                config('module.commandes.table').'.etat',
                config('module.commandes.table').'.created_at',
                config('module.commandes.table').'.updated_at',
                config('access.users_table').'.first_name as user_name',
            ]);
    }

    public function findById($id)
    {

        if (!is_null($this->query()->whereid($id)->firstOrFail())) {


            return $this->query()->whereid($id)->firstOrFail();
        }

        throw new GeneralException(trans('exceptions.backend.access.commandes.not_found'));
    }
}