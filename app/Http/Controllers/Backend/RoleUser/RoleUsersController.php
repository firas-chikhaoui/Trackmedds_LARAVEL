<?php

namespace App\Http\Controllers\Backend\RoleUser;

use App\Models\RoleUser\RoleUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\RoleUser\CreateResponse;
use App\Http\Responses\Backend\RoleUser\EditResponse;
use App\Repositories\Backend\RoleUser\RoleUserRepository;
use App\Http\Requests\Backend\RoleUser\ManageRoleUserRequest;

/**
 * RoleUsersController
 */
class RoleUsersController extends Controller
{
    /**
     * variable to store the repository object
     * @var RoleUserRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param RoleUserRepository $repository;
     */
    public function __construct(RoleUserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\RoleUser\ManageRoleUserRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageRoleUserRequest $request)
    {
        return new ViewResponse('backend.roleusers.index');
    }
    
}
