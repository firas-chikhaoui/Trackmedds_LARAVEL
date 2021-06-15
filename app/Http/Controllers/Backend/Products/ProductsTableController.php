<?php

namespace App\Http\Controllers\Backend\Products;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Products\ProductRepository;
use App\Http\Requests\Backend\Products\ManageProductRequest;

/**
 * Class ProductsTableController.
 */
class ProductsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProductRepository
     */
    protected $product;

    /**
     * contructor to initialize repository object
     * @param ProductRepository $product;
     */
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    /**
     * This method return the data of the model
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProductRequest $request)
    {
        return Datatables::of($this->product->getForDataTable())
            ->escapeColumns(['id'])

            ->addColumn('nproduct', function ($product) {
                return $product->nproduct;
            })

            ->addColumn('featured_image', function ($product) {
                return '<img style ="width: 60px;height: 60px;" src='.asset('assets/images/' . $product->featured_image ).'  />';
            })

            ->addColumn('status', function ($product) {
                return $product->status;
            })

            ->addColumn('quantité', function ($product) {
                return $product->quantité;
            })

            ->addColumn('price', function ($product) {
                return $product->price;
            })

            ->addColumn('created_at', function ($product) {
                return Carbon::parse($product->created_at)->toDateString();
            })
            ->addColumn('actions', function ($product) {
                return $product->action_buttons;
            })
            ->make(true);
    }
}
