<?php

namespace App\Http\Controllers\Backend\Stocks;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Stocks\StockRepository;
use App\Http\Requests\Backend\Stocks\ManageStockRequest;

/**
 * Class StocksTableController.
 */
class StocksTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var StockRepository
     */
    protected $stock;

    /**
     * contructor to initialize repository object
     * @param StockRepository $stock;
     */
    public function __construct(StockRepository $stock)
    {
        $this->stock = $stock;
    }

    /**
     * This method return the data of the model
     * @param ManageStockRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageStockRequest $request)
    {
        return Datatables::of($this->stock->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('nompharmacie', function ($stock) {
                return $stock->nompharmacie;
            })
            ->addColumn('nomproduit', function ($stock) {
                return $stock->nomproduit;
            })
            ->addColumn('quantite', function ($stock) {
                return $stock->quantite;
            })
            ->addColumn('created_at', function ($stock) {
                return Carbon::parse($stock->created_at)->toDateString();
            })
            ->addColumn('actions', function ($stock) {
                return $stock->action_buttons;
            })
            ->make(true);
    }
}
