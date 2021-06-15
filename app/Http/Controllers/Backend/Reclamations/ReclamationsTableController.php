<?php

namespace App\Http\Controllers\Backend\Reclamations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Reclamations\ManageReclamationsRequest;
use App\Repositories\Backend\Reclamations\ReclamationsRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class ReclamationsTableController extends Controller
{
    /**
     * @var ReclamationsRepository
     */
    protected $reclamations;

    /**
     * @param ReclamationsRepository $reclamations
     */
    public function __construct(ReclamationsRepository $reclamations)
    {
        $this->reclamations = $reclamations;
    }

    /**
     * @param ManageReclamationsRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageReclamationsRequest $request)
    {
        return Datatables::of($this->reclamations->getForDataTable())
            ->escapeColumns(['name'])
            ->addColumn('status', function ($reclamations) {
                return $reclamations->status_label;
            })
            ->addColumn('email', function ($reclamations) {
                return $reclamations->email;
            })
            ->addColumn('phone', function ($reclamations) {
                return $reclamations->phone;
            })
            ->addColumn('subject', function ($reclamations) {
                return $reclamations->subject;
            })
            ->addColumn('message', function ($reclamations) {
                return $reclamations->message;
            })
            ->addColumn('pharmacie', function ($reclamations) {
                return $reclamations->pharmacie;
            })
            ->addColumn('medicament', function ($reclamations) {
                return $reclamations->medicament;
            })
            ->addColumn('actions', function ($reclamations) {
                return $reclamations->action_buttons;
            })
            ->make(true);
    }
}
