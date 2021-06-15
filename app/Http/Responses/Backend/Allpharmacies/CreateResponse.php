<?php

namespace App\Http\Responses\Backend\Allpharmacies;

use Illuminate\Contracts\Support\Responsable;
use App\Models\Access\Role\Role;
class CreateResponse implements Responsable
{
    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        $role=Role::with('users')->find(3);
        $users=$role->users;
        return view('backend.allpharmacies.create')->with([
            "users"=>$users
        ]);
    }
}