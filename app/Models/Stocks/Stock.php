<?php

namespace App\Models\Stocks;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stocks\Traits\StockAttribute;
use App\Models\Stocks\Traits\StockRelationship;

class Stock extends Model
{
    use ModelTrait,
        StockAttribute,
    	StockRelationship {
            // StockAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'stocks';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [


    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [
        'id',
        'nompharmacie',
        'nomproduit',
        'quantite',
        'created_at',
        'updated_at'
];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
