<?php

namespace App\Http\Controllers\Backend\Allpharmacies;

use App\Models\Allpharmacies\Allpharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Allpharmacies\CreateResponse;
use App\Http\Responses\Backend\Allpharmacies\EditResponse;
use App\Repositories\Backend\Allpharmacies\AllpharmacyRepository;
use App\Http\Requests\Backend\Allpharmacies\ManageAllpharmacyRequest;
use App\Http\Requests\Backend\Allpharmacies\CreateAllpharmacyRequest;
use App\Http\Requests\Backend\Allpharmacies\StoreAllpharmacyRequest;
use App\Http\Requests\Backend\Allpharmacies\EditAllpharmacyRequest;
use App\Http\Requests\Backend\Allpharmacies\UpdateAllpharmacyRequest;
use App\Http\Requests\Backend\Allpharmacies\DeleteAllpharmacyRequest;

/**
 * AllpharmaciesController
 */
class AllpharmaciesController extends Controller
{
    /**
     * variable to store the repository object
     * @var AllpharmacyRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AllpharmacyRepository $repository;
     */
    public function __construct(AllpharmacyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Allpharmacies\ManageAllpharmacyRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAllpharmacyRequest $request)
    {
        return new ViewResponse('backend.allpharmacies.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAllpharmacyRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Allpharmacies\CreateResponse
     */
    public function create(CreateAllpharmacyRequest $request)
    {
        return new CreateResponse('backend.allpharmacies.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAllpharmacyRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAllpharmacyRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.allpharmacies.index'), ['flash_success' => trans('alerts.backend.allpharmacies.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Allpharmacies\Allpharmacy  $allpharmacy
     * @param  EditAllpharmacyRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Allpharmacies\EditResponse
     */
    public function edit(Allpharmacy $allpharmacy, EditAllpharmacyRequest $request)
    {
        return new EditResponse($allpharmacy);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAllpharmacyRequestNamespace  $request
     * @param  App\Models\Allpharmacies\Allpharmacy  $allpharmacy
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAllpharmacyRequest $request, Allpharmacy $allpharmacy)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $allpharmacy, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.allpharmacies.index'), ['flash_success' => trans('alerts.backend.allpharmacies.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAllpharmacyRequestNamespace  $request
     * @param  App\Models\Allpharmacies\Allpharmacy  $allpharmacy
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Allpharmacy $allpharmacy, DeleteAllpharmacyRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($allpharmacy);
        //returning with successfull message
        return new RedirectResponse(route('admin.allpharmacies.index'), ['flash_success' => trans('alerts.backend.allpharmacies.deleted')]);
    }
    
}
