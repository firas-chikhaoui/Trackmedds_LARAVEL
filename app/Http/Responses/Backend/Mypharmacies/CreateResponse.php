<?php

namespace App\Http\Responses\Backend\Mypharmacies;

use App\Models\Access\Role\Role;
use Illuminate\Contracts\Support\Responsable;

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
        return view('backend.mypharmacies.create')->with([
            "users"=>$users
        ]);
    }
}