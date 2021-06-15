<?php

namespace App\Http\Controllers\Backend\Pharmacies;

use App\Models\Pharmacies\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Pharmacies\CreateResponse;
use App\Http\Responses\Backend\Pharmacies\EditResponse;
use App\Repositories\Backend\Pharmacies\PharmacyRepository;
use App\Http\Requests\Backend\Pharmacies\ManagePharmacyRequest;
use App\Http\Requests\Backend\Pharmacies\CreatePharmacyRequest;
use App\Http\Requests\Backend\Pharmacies\StorePharmacyRequest;
use App\Http\Requests\Backend\Pharmacies\EditPharmacyRequest;
use App\Http\Requests\Backend\Pharmacies\UpdatePharmacyRequest;
use App\Http\Requests\Backend\Pharmacies\DeletePharmacyRequest;

/**
 * PharmaciesController
 */
class PharmaciesController extends Controller
{
    /**
     * variable to store the repository object
     * @var PharmacyRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PharmacyRepository $repository;
     */
    public function __construct(PharmacyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Pharmacies\ManagePharmacyRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePharmacyRequest $request)
    {
        return new ViewResponse('backend.pharmacies.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePharmacyRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Pharmacies\CreateResponse
     */
    public function create(CreatePharmacyRequest $request)
    {
        return new CreateResponse('backend.pharmacies.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePharmacyRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePharmacyRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.pharmacies.index'), ['flash_success' => trans('alerts.backend.pharmacies.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Pharmacies\Pharmacy  $pharmacy
     * @param  EditPharmacyRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Pharmacies\EditResponse
     */
    public function edit(Pharmacy $pharmacy, EditPharmacyRequest $request)
    {
        return new EditResponse($pharmacy);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePharmacyRequestNamespace  $request
     * @param  App\Models\Pharmacies\Pharmacy  $pharmacy
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePharmacyRequest $request, Pharmacy $pharmacy)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $pharmacy, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.pharmacies.index'), ['flash_success' => trans('alerts.backend.pharmacies.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePharmacyRequestNamespace  $request
     * @param  App\Models\Pharmacies\Pharmacy  $pharmacy
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Pharmacy $pharmacy, DeletePharmacyRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($pharmacy);
        //returning with successfull message
        return new RedirectResponse(route('admin.pharmacies.index'), ['flash_success' => trans('alerts.backend.pharmacies.deleted')]);
    }
    
}
