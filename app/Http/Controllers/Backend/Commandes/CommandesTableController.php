<?php

namespace App\Http\Controllers\Backend\Commandes;

use App\Models\Commandes\Commande;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Commandes\CommandeRepository;
use App\Http\Requests\Backend\Commandes\ManageCommandeRequest;

/**
 * Class CommandesTableController.
 */
class CommandesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var CommandeRepository
     */
    protected $commande;

    /**
     * contructor to initialize repository object
     * @param CommandeRepository $commande;
     */
    public function __construct(CommandeRepository $commande)
    {
        $this->commande = $commande;
    }

    /**
     * This method return the data of the model
     * @param ManageCommandeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCommandeRequest $request)
    {

        return Datatables::of($this->commande->getForDataTable())
            ->escapeColumns(['id'])

            ->addColumn('etat', function ($commande) {
                return $commande->status_label;
            })
            ->addColumn('created_at', function ($commande) {
                return Carbon::parse($commande->created_at)->toDateString();
            })
            ->addColumn('updated_at', function ($commande) {
                return Carbon::parse($commande->updated_at)->toDateString();
            })
            ->addColumn('actions', function ($commande) {
                return $commande->action_buttons;
            })
            ->addColumn('created_by', function ($commande) {
                return $commande->user_name;
            })
            ->make(true);
    }
}
