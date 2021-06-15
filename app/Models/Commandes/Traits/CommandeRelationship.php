<?php

namespace App\Models\Commandes\Traits;

use App\Models\Access\User\User;
use App\Models\Products\Product;
use App\Models\Providers\Provider;

/**
 * Class CommandeRelationship
 */
trait CommandeRelationship
{
   /* public function products()
    {
        return $this->belongsToMany(Product::class , 'commande_product' ,'product_id', 'id');
    }*/
    /**
     * Blogs belongsTo with User.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
public function livrer(){
        return $this->belongsTo(User ::class ,'livred_by');
}
}
