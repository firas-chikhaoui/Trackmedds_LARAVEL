<?php

namespace App\Http\Controllers\Backend\Mypharmacies;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Mypharmacies\MypharmacyRepository;
use App\Http\Requests\Backend\Mypharmacies\ManageMypharmacyRequest;

/**
 * Class MypharmaciesTableController.
 */
class MypharmaciesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var MypharmacyRepository
     */
    protected $mypharmacy;

    /**
     * contructor to initialize repository object
     * @param MypharmacyRepository $mypharmacy;
     */
    public function __construct(MypharmacyRepository $mypharmacy)
    {
        $this->mypharmacy = $mypharmacy;
    }

    /**
     * This method return the data of the model
     * @param ManageMypharmacyRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageMypharmacyRequest $request)
    {
        return Datatables::of($this->mypharmacy->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($mypharmacy) {
                return Carbon::parse($mypharmacy->created_at)->toDateString();
            })
            ->addColumn('actions', function ($mypharmacy) {
                return $mypharmacy->action_buttons;
            })
            ->make(true);
    }
}
