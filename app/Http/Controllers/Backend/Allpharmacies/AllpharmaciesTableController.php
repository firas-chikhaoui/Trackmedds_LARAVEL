<?php

namespace App\Http\Controllers\Backend\Allpharmacies;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Allpharmacies\AllpharmacyRepository;
use App\Http\Requests\Backend\Allpharmacies\ManageAllpharmacyRequest;

/**
 * Class AllpharmaciesTableController.
 */
class AllpharmaciesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AllpharmacyRepository
     */
    protected $allpharmacy;

    /**
     * contructor to initialize repository object
     * @param AllpharmacyRepository $allpharmacy;
     */
    public function __construct(AllpharmacyRepository $allpharmacy)
    {
        $this->allpharmacy = $allpharmacy;
    }

    /**
     * This method return the data of the model
     * @param ManageAllpharmacyRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAllpharmacyRequest $request)
    {
        return Datatables::of($this->allpharmacy->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($allpharmacy) {
                return Carbon::parse($allpharmacy->created_at)->toDateString();
            })
            ->addColumn('actions', function ($allpharmacy) {
                return $allpharmacy->action_buttons;
            })
            ->make(true);
    }
}
