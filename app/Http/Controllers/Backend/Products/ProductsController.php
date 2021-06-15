<?php

namespace App\Http\Controllers\Backend\Products;

use App\Models\Products\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Products\CreateResponse;
use App\Http\Responses\Backend\Products\EditResponse;
use App\Repositories\Backend\Products\ProductRepository;
use App\Http\Requests\Backend\Products\ManageProductRequest;
use App\Http\Requests\Backend\Products\CreateProductRequest;
use App\Http\Requests\Backend\Products\StoreProductRequest;
use App\Http\Requests\Backend\Products\EditProductRequest;
use App\Http\Requests\Backend\Products\UpdateProductRequest;
use App\Http\Requests\Backend\Products\DeleteProductRequest;

/**
 * ProductsController
 */
class ProductsController extends Controller
{
    protected $status = [
        'Cardiologie' => 'Cardiologie',
        'Antimycosiques' => 'Antimycosiques',
        'Antiviraux'  => 'Antiviraux',
        'Antilépreux' => 'Antilépreux',
    ];

    /**
     * variable to store the repository object
     * @var ProductRepository
     */
    protected $product;

    /**
     * @param \App\Repositories\Backend\Products\ProductRepository $product
     */
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Products\ManageProductRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageProductRequest $request)
    {
        return new ViewResponse('backend.products.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateProductRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Products\CreateResponse
     */
    public function create(CreateProductRequest $request)
    {
        return new CreateResponse('backend.products.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        $this->product->create($request->except('_token'));

        return new RedirectResponse(route('admin.products.index'), ['flash_success' => trans('alerts.backend.products.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Products\Product  $product
     * @param  EditProductRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Products\EditResponse
     */
    public function edit(Product $product, EditProductRequest $request)
    {
        return new EditResponse($product);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductRequestNamespace  $request
     * @param  App\Models\Products\Product  $product
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->product->update( $product, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.products.index'), ['flash_success' => trans('alerts.backend.products.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteProductRequestNamespace  $request
     * @param  App\Models\Products\Product  $product
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Product $product, DeleteProductRequest $request)
    {
        //Calling the delete method on repository
        $this->product->delete($product);
        //returning with successfull message
        return new RedirectResponse(route('admin.products.index'), ['flash_success' => trans('alerts.backend.products.deleted')]);
    }


}
