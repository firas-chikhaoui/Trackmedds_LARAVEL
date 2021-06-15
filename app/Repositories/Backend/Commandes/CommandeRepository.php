<?php

namespace App\Repositories\Backend\Commandes;

use App\Models\Products\Product;
use DB;
use Carbon\Carbon;
use App\Models\Commandes\Commande;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Events\Backend\Commandes\CommandeCreated;

/**
 * Class CommandeRepository.
 */
class CommandeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Commande::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()

    {
        return $this->query()->with('livrer')
            ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.commandes.table').'.created_by')
            ->leftjoin('users as livrer', 'livrer.id', '=', config('module.commandes.table').'.livred_by')
            ->select([
                config('module.commandes.table').'.id',
                config('module.commandes.table').'.etat',
                config('module.commandes.table').'.created_at',
                config('module.commandes.table').'.updated_at',
                config('module.commandes.table').'.livred_at',
                config('access.users_table').'.first_name as user_name',
                'livrer.first_name as livrer_name',
                config('module.commandes.table').'.tot',
                ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    private function notify($cmd) {
        event(new CommandeCreated($cmd));
    }
    public function create(array $input)
    {
        $input['etat'] = isset($input['etat']) ? 1 : 0;
        $productsList = collect($input['products']);
        //dd($productsArray);
        $productsArray = $productsList->map(function($item) {
            return $item['product'];

        });
        //dd($productsArray, $productsList);
        $productsSync = [];
     ;
        foreach($productsList as $pl) {
            $productsSync[$pl['product']] = ['qte' => $pl['qty']];

        }
       // dd($productsSync);
        $productsArray = $this->createProducts($productsArray) ;
        unset($input['products']);

        DB::transaction(function () use ($input ,$productsSync){
            $input['created_by'] = access()->user()->id;
            $input2['livred_by']= access()->user()->first_name;

            //dd($input);
         //dd($productsArray);

            try {
            $id = DB::table('commandes')->insertGetId($input);
            $cmd = Commande::findOrFail($id);
           
                if (count($productsSync)) {

                    $cmd->products()->sync($productsSync);
                }
              $this->notify($cmd);
 ;           } catch(\Exception $e) {
                dd($e);
                throw new GeneralException(trans('exceptions.backend.commandes.create_error'));
            }




           ;

        });

    }
    /**
     * For updating the respective Model in storage
     *
     * @param Commande $commande
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Commande $commande, array $input)
    {
        $input['etat'] = isset($input['etat']) ? 1 : 0;
        $productsArray = $this->createProducts($input['products']) ;
        unset($input['products']);

        DB::transaction(function () use ($commande, $input, $productsArray) {
        if ($commande->update($input)) {

            if (count($productsArray))  {
                $commande->products()->sync($productsArray);
            }
            event(new CommandeUpdated($commande));

            return true;
        }

        throw new GeneralException(
            trans('exceptions.backend.commandes.update_error')
        );
    });

    }
    public function createProducts($products)
    {
        //Creating a new array for tags (newly created)
        $products_array = [];

        foreach ($products as $product) {
            if (is_numeric($product)) {
                $products_array[] = $product;
            } else {
                $newProduct = Product::create(['nproduct' => $product,'created_by' => 1]);
                $products_array[] = $newProduct->id;
            }
        }

        return $products_array;
    }

}
