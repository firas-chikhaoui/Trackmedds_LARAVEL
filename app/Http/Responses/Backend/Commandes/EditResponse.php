<?php

namespace App\Http\Responses\Backend\Commandes;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Commandes\Commande
     */
    protected $commandes;
    protected $commandeProducts;

    /**
     * @param App\Models\Commandes\Commande $commandes
     */
    public function __construct($commandes  ,$commandeProducts )
    {
        $this->commandes = $commandes;
    
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

        return view('backend.commandes.edit')->with([
            'commandes' => $this->commandes,
            'commandeProducts'=> $this->commandeProducts,
        ]);
    }
}