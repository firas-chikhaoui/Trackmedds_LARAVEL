<?php

namespace App\Repositories\Backend\Reclamations;

use App\Exceptions\GeneralException;
use App\Models\Reclamations\Reclamation;
use App\Repositories\BaseRepository;

/**
 * Class ReclamationsRepository.
 */
class ReclamationsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Reclamation::class;

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.reclamations.table').'.id',
                config('module.reclamations.table').'.name',
                config('module.reclamations.table').'.email',
                config('module.reclamations.table').'.status',
                config('module.reclamations.table').'.phone',
                config('module.reclamations.table').'.subject',
                config('module.reclamations.table').'.message',
                config('module.reclamations.table').'.pharmacie',
                config('module.reclamations.table').'.medicament',
            ]);
    }

    /**
     * @param array $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        $input['status'] = isset($input['status']) ? 1 : 0;

        //If Reclamation saved successfully, then return true
        if (Reclamation::create($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.reclamations.create_error'));
    }

    /**
     * @param \App\Models\Reclamations\Reclamation $reclamation
     * @param array                $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * return bool
     */
    public function update(Reclamation $reclamation, array $input)
    {
        $input['status'] = isset($input['status']) ? 1 : 0;

        //If reclamation updated successfully
        if ($reclamation->update($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.reclamations.update_error'));
    }

    /**
     * @param \App\Models\Reclamations\Reclamation $reclamation
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function delete(Reclamation $reclamation)
    {
        if ($reclamation->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.reclamations.delete_error'));
    }

    /**
     * @param \App\Models\Reclamations\Reclamation $reclamation
     * @param string               $status
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function mark(Reclamation $reclamation, $status)
    {
        $reclamation->status = $status;

        if ($reclamation->save()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.reclamations.mark_error'));
    }
}
