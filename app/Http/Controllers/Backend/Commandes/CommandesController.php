<?php

namespace App\Http\Controllers\Backend\Commandes;

use App\Events\Backend\Providers\providers;
use App\Models\Commandes\Commande;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Commandes\CreateResponse;
use App\Http\Responses\Backend\Commandes\EditResponse;
use App\Repositories\Backend\Commandes\CommandeRepository;
use App\Http\Requests\Backend\Commandes\ManageCommandeRequest;
use App\Http\Requests\Backend\Commandes\CreateCommandeRequest;
use App\Http\Requests\Backend\Commandes\StoreCommandeRequest;
use App\Http\Requests\Backend\Commandes\EditCommandeRequest;
use App\Http\Requests\Backend\Commandes\UpdateCommandeRequest;
use App\Models\Products\product;
use App\Models\Access\Role\role;
use App\http\Controllers\Backend\Access\Role\RoleController;
use App\Models\Providers\Provider;

/**
 * CommandesController
 */
class CommandesController extends Controller
{
    protected $status = [
        'Livred' => 'Livred',
        'Not Livred' => 'Not Livred',
    ];

    protected $repository;
    protected $commandes;
    /**
     * contructor to initialize repository object
     * @param CommandeRepository $commandes;
     */
    public function __construct(CommandeRepository $commandes)
    {
        $this->commandes = $commandes;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Commandes\ManageCommandeRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index()
    {
        $commandes = Commande::with('products')->get();
        $role=Role::with('users')->find(2);
        $users=$role->users;
        return new ViewResponse('backend.commandes.index',compact('commandes','users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateCommandeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Commandes\CreateResponse
     */
    public function create(CreateCommandeRequest $request)
    {
        $commandeProducts =Product::all();
      //  $commandeProducts->toArray();
        $role=Role::with('users')->find(2);
        $users=$role->users;
        return new CreateResponse($this->status, $commandeProducts);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCommandeRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreCommandeRequest $request)
    {
        //dd($request->all());


        //Input received from the request
        $input = $request->except(['_token','products']);
        foreach($request->products as $product) {
            $prod = explode('-',$product)[0];
            $qty = explode('-',$product)[1];
            $input['products'] []= ['product' => $prod, 'qty' => $qty];


        }



        //Create the model using repository create methodf
       // dd($request->all());
        $this->commandes->create($input);

        //return with successfull message
        return new RedirectResponse(route('admin.commandes.index'), ['flash_success' => trans('alerts.backend.commandes.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Commandes\Commande  $commande
     * @param  EditCommandeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Commandes\EditResponse
     */
    public function edit($id)
    {
        $commandeProducts =Commande::find($id);

        var_dump($commandeProducts);
       // return new EditResponse($this->status, $commandeProducts);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCommandeRequestNamespace  $request
     * @param  App\Models\Commandes\Commande  $commande
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->commandes->update( $commande, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.commandes.index'), ['flash_success' => trans('alerts.backend.commandes.updated')]);
    }

}