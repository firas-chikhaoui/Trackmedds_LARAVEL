<?php

namespace App\Models\Commandes;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commandes\Traits\CommandeAttribute;
use App\Models\Commandes\Traits\CommandeRelationship;
use App\Models\Products\Product;

class Commande extends Model
{
    use ModelTrait,
        CommandeAttribute,
    	CommandeRelationship {
            // CommandeAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'commandes';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
         'etat',
        'created_by',
        'livred_by',
        'tot',
    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [
        'etat',
        'tot'
    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'livred_at',
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class , 'commande_product' ,'commande_id', 'product_id')->withPivot('qte');
    }
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.commandes.table');
    }

}
