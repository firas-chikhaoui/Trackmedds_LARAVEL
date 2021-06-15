<?php

namespace App\Http\Controllers\Backend\Pharmacies;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Pharmacies\PharmacyRepository;
use App\Http\Requests\Backend\Pharmacies\ManagePharmacyRequest;

/**
 * Class PharmaciesTableController.
 */
class PharmaciesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PharmacyRepository
     */
    protected $pharmacy;

    /**
     * contructor to initialize repository object
     * @param PharmacyRepository $pharmacy;
     */
    public function __construct(PharmacyRepository $pharmacy)
    {
        $this->pharmacy = $pharmacy;
    }

    /**
     * This method return the data of the model
     * @param ManagePharmacyRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePharmacyRequest $request)
    {
        return Datatables::of($this->pharmacy->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('nompharmacie', function ($pharmacy) {
                return $pharmacy->nompharmacie;
            })
            ->addColumn('adressepharmacie', function ($pharmacy) {
                return $pharmacy->adressepharmacie;
            })
            ->addColumn('numerotel', function ($pharmacy) {
                return $pharmacy->numerotel;
            })
            ->addColumn('amplitude', function ($pharmacy) {
                return $pharmacy->amplitude;
            })
            ->addColumn('altitude', function ($pharmacy) {
                return $pharmacy->altitude;
            })
            ->addColumn('created_at', function ($pharmacy) {
                return Carbon::parse($pharmacy->created_at)->toDateString();
            })
            ->addColumn('actions', function ($pharmacy) {
                return $pharmacy->action_buttons;
            })
            ->make(true);
    }
}
