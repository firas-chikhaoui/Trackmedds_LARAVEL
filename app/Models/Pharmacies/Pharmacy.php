<?php

namespace App\Models\Pharmacies;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pharmacies\Traits\PharmacyAttribute;
use App\Models\Pharmacies\Traits\PharmacyRelationship;

class Pharmacy extends Model
{
    use ModelTrait,
        PharmacyAttribute,
    	PharmacyRelationship {
            // PharmacyAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'pharmacies';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'id',
        'nompharmacie',
        'adressepharmacie',
        'numerotel',
        'amplitude',
        'altitude',
        'created_at',
        'updated_at',
       ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

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
