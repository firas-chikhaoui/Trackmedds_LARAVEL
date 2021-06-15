<?php

namespace App\Http\Responses\Backend\Commandes;

use App\Models\Access\Role\Role;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{

    protected $commandeProducts;


    public function __construct($status, $commandeProducts)
    {
        $this->commandeProducts = $commandeProducts;
    }
    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        $role=Role::with('users')->find(2);
        $users=$role->users;
        return view('backend.commandes.create')->with([
            'commandeProducts'=> $this->commandeProducts,
            "users"=>$users
        ]);
    }
}