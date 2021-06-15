<?php

namespace App\Http\Controllers\Backend\Reclamations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Reclamations\CreateReclamationsRequest;
use App\Http\Requests\Backend\Reclamations\DeleteReclamationsRequest;
use App\Http\Requests\Backend\Reclamations\EditReclamationsRequest;
use App\Http\Requests\Backend\Reclamations\ManageReclamationsRequest;
use App\Http\Requests\Backend\Reclamations\StoreReclamationsRequest;
use App\Http\Requests\Backend\Reclamations\UpdateReclamationsRequest;
use App\Http\Responses\Backend\Reclamation\EditResponse;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Reclamations\Reclamation;
use App\Repositories\Backend\Reclamations\ReclamationsRepository;



class ReclamationsController extends Controller
{
    /**
     * reclamation Repository.
     *
     * @var \App\Repositories\Backend\Reclamations\ReclamationsRepository
     */
    protected $reclamation;

    /**
     * @param \App\Repositories\Backend\Reclamations\ReclamationsRepository $reclamation
     */
    public function __construct(ReclamationsRepository $reclamation)
    {
        $this->reclamation = $reclamation;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Requests\Backend\Reclamations\ManageReclamationsRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageReclamationsRequest $request)
    {
        return new ViewResponse('backend.Reclamations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Http\Requests\Backend\Reclamations\CreateReclamationsRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function create(CreateReclamationsRequest $request)
    {
        return new ViewResponse('backend.Reclamations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Backend\Reclamations\StoreReclamationsRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreReclamationsRequest $request)
    {
        $this->reclamation->create($request->all());

        return new RedirectResponse(route('admin.Reclamations.index'), ['flash_success' => trans('alerts.backend.Reclamations.created')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Reclamations\Reclamation                            $reclamation
     * @param \App\Http\Requests\Backend\Reclamations\EditReclamationsRequest $request
     *
     * @return \App\Http\Responses\Backend\Reclamation\EditResponse
     */
    public function edit(Reclamation $reclamation, EditReclamationsRequest $request)
    {
        return new EditResponse($reclamation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Backend\Reclamations\UpdateReclamationsRequest $request
     * @param \App\Models\Reclamations\Reclamation                              $id
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateReclamationsRequest $request, Reclamation $reclamation)
    {
        $this->reclamation->update($reclamation, $request->all());

        return new RedirectResponse(route('admin.Reclamations.index'), ['flash_success' => trans('alerts.backend.Reclamations.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Reclamations\Reclamation                              $reclamation
     * @param \App\Http\Requests\Backend\Reclamations\DeleteReclamationsRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Reclamation $reclamation, DeleteReclamationsRequest $request)
    {
        $this->reclamation->delete($reclamation);

        return new RedirectResponse(route('admin.Reclamations.index'), ['flash_success' => trans('alerts.backend.Reclamations.deleted')]);
    }
}
