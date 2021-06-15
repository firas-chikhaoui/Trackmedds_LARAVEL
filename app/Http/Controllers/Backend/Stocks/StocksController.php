<?php

namespace App\Http\Controllers\Backend\Stocks;

use App\Models\Stocks\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Stocks\CreateResponse;
use App\Http\Responses\Backend\Stocks\EditResponse;
use App\Repositories\Backend\Stocks\StockRepository;
use App\Http\Requests\Backend\Stocks\ManageStockRequest;
use App\Http\Requests\Backend\Stocks\CreateStockRequest;
use App\Http\Requests\Backend\Stocks\StoreStockRequest;
use App\Http\Requests\Backend\Stocks\EditStockRequest;
use App\Http\Requests\Backend\Stocks\UpdateStockRequest;
use App\Http\Requests\Backend\Stocks\DeleteStockRequest;

/**
 * StocksController
 */
class StocksController extends Controller
{
    /**
     * variable to store the repository object
     * @var StockRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param StockRepository $repository;
     */
    public function __construct(StockRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Stocks\ManageStockRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageStockRequest $request)
    {
        return new ViewResponse('backend.stocks.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateStockRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Stocks\CreateResponse
     */
    public function create(CreateStockRequest $request)
    {
        return new CreateResponse('backend.stocks.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreStockRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreStockRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.stocks.index'), ['flash_success' => trans('alerts.backend.stocks.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Stocks\Stock  $stock
     * @param  EditStockRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Stocks\EditResponse
     */
    public function edit(Stock $stock, EditStockRequest $request)
    {
        return new EditResponse($stock);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStockRequestNamespace  $request
     * @param  App\Models\Stocks\Stock  $stock
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateStockRequest $request, Stock $stock)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $stock, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.stocks.index'), ['flash_success' => trans('alerts.backend.stocks.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteStockRequestNamespace  $request
     * @param  App\Models\Stocks\Stock  $stock
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Stock $stock, DeleteStockRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($stock);
        //returning with successfull message
        return new RedirectResponse(route('admin.stocks.index'), ['flash_success' => trans('alerts.backend.stocks.deleted')]);
    }
    
}
