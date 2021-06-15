<?php

namespace App\Http\Controllers\Backend\Reclamations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Reclamations\EditReclamationsRequest;
use App\Models\Reclamations\Reclamation;
use App\Repositories\Backend\Reclamations\ReclamationsRepository;

class ReclamationStatusController extends Controller
{
    protected $reclamation;

    /**
     * @param \App\Repositories\Backend\Reclamations\ReclamationsRepository $reclamation
     */
    public function __construct(ReclamationsRepository $reclamation)
    {
        $this->reclamation = $reclamation;
    }

    /**
     * @param \App\Models\Reclamations\Reclamation $Reclamation
     * @param $status
     * @param \App\Http\Requests\Backend\Reclamations\ManageReclamationsRequest $request
     *
     * @return mixed
     */
    public function store(Reclamation $reclamation, $status, EditReclamationsRequest $request)
    {
        $this->reclamation->mark($reclamation, $status);

        return redirect()
            ->route('admin.reclamations.index')
            ->with('flash_success', trans('alerts.backend.reclamations.updated'));
    }
}
