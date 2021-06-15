<?php
namespace App\Http\Controllers;
use App\Product;
use App\Http\Models\CommandeProduct\CommandeProduct;
use App\Reclamation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
//use App\Models\CommandeProduct;
class ProductsController extends Controller
{
    public function placeOrder($id)
    {
        
        $CMD=DB::table('commande_product')->where('commande_id',$id)->select('product_id')->first();

        $CMD2=DB::table('commande_product')->where('id',$id)->select('qte')->first();
        
       
        if($CMD)
        
        {
            ///->update(['quantité' => -$qte])
            $produit=DB::table('products')->where('id', $CMD->product_id)->first();
            if($produit->quantité<$CMD2->qte)
            {
                return "you can't";
            }
            $res=DB::table('products')->where('id', $CMD->product_id)->update(['quantité' => $produit->quantité -$CMD2->qte]);
            $produitnew=DB::table('products')->where('id', $CMD->product_id)->first();
            
         //return [$CMD,$res,$produit,$qte,$produitnew];
         return $res;
        }
       

    }
}