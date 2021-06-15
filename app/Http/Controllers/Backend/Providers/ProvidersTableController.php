<?php

namespace App\Http\Controllers\Backend\Providers;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Providers\ProviderRepository;
use App\Http\Requests\Backend\Providers\ManageProviderRequest;

/**
 * Class ProvidersTableController.
 */
class ProvidersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProviderRepository
     */
    protected $provider;

    /**
     * contructor to initialize repository object
     * @param ProviderRepository $provider;
     */
    public function __construct(ProviderRepository $provider)
    {
        $this->provider = $provider;
    }

    /**
     * This method return the data of the model
     * @param ManageProviderRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProviderRequest $request)
    {
        return Datatables::of($this->provider->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('nprovider', function ($provider) {
                return $provider->nprovider;
            })
            ->addColumn('adresse', function ($provider) {
                return $provider->adresse;
            })
            ->addColumn('tel', function ($provider) {
                return $provider->tel;
            })
            ->addColumn('classf', function ($provider) {
                return $provider->classf;
            })
            ->addColumn('created_at', function ($provider) {
                return Carbon::parse($provider->created_at)->toDateString();
            })
            ->addColumn('updated_at', function ($provider) {
                return Carbon::parse($provider->updated_at)->toDateString();
            })
            ->addColumn('actions', function ($provider) {
                return $provider->action_buttons;
            })
            ->make(true);
    }
}
