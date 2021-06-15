<?php

namespace App\Http\Controllers\Backend\Mypharmacies;

use App\Models\Access\Role\Role;
use App\Models\Mypharmacies\Mypharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Mypharmacies\CreateResponse;
use App\Http\Responses\Backend\Mypharmacies\EditResponse;
use App\Repositories\Backend\Mypharmacies\MypharmacyRepository;
use App\Http\Requests\Backend\Mypharmacies\ManageMypharmacyRequest;
use App\Http\Requests\Backend\Mypharmacies\CreateMypharmacyRequest;
use App\Http\Requests\Backend\Mypharmacies\StoreMypharmacyRequest;
use App\Http\Requests\Backend\Mypharmacies\EditMypharmacyRequest;
use App\Http\Requests\Backend\Mypharmacies\UpdateMypharmacyRequest;

/**
 * MypharmaciesController
 */
class MypharmaciesController extends Controller
{
    /**
     * variable to store the repository object
     * @var MypharmacyRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param MypharmacyRepository $repository;
     */
    public function __construct(MypharmacyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Mypharmacies\ManageMypharmacyRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageMypharmacyRequest $request)
    {
        return new ViewResponse('backend.mypharmacies.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateMypharmacyRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Mypharmacies\CreateResponse
     */
    public function create(CreateMypharmacyRequest $request)
    {
        $role=Role::with('users')->find(3);
        $users=$role->users;
        return new CreateResponse('backend.mypharmacies.create',compact('mypharmacies','users'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreMypharmacyRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreMypharmacyRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.mypharmacies.index'), ['flash_success' => trans('alerts.backend.mypharmacies.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Mypharmacies\Mypharmacy  $mypharmacy
     * @param  EditMypharmacyRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Mypharmacies\EditResponse
     */
    public function edit(Mypharmacy $mypharmacy, EditMypharmacyRequest $request)
    {

        return new EditResponse($mypharmacy);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateMypharmacyRequestNamespace  $request
     * @param  App\Models\Mypharmacies\Mypharmacy  $mypharmacy
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateMypharmacyRequest $request, Mypharmacy $mypharmacy)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $mypharmacy, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.mypharmacies.index'), ['flash_success' => trans('alerts.backend.mypharmacies.updated')]);
    }
    
}
