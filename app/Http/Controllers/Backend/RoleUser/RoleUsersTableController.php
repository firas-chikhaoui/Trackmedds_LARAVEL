<?php

namespace App\Http\Controllers\Backend\RoleUser;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\RoleUser\RoleUserRepository;
use App\Http\Requests\Backend\RoleUser\ManageRoleUserRequest;

/**
 * Class RoleUsersTableController.
 */
class RoleUsersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var RoleUserRepository
     */
    protected $roleuser;

    /**
     * contructor to initialize repository object
     * @param RoleUserRepository $roleuser;
     */
    public function __construct(RoleUserRepository $roleuser)
    {
        $this->roleuser = $roleuser;
    }

    /**
     * This method return the data of the model
     * @param ManageRoleUserRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageRoleUserRequest $request)
    {
        return Datatables::of($this->roleuser->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($roleuser) {
                return Carbon::parse($roleuser->created_at)->toDateString();
            })
            ->addColumn('actions', function ($roleuser) {
                return $roleuser->action_buttons;
            })
            ->make(true);
    }
}
