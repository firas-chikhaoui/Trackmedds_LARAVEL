<?php

namespace App\Models\Mypharmacies;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mypharmacies\Traits\MypharmacyAttribute;
use App\Models\Mypharmacies\Traits\MypharmacyRelationship;

class Mypharmacy extends Model
{
    use ModelTrait,
        MypharmacyAttribute,
    	MypharmacyRelationship {
            // MypharmacyAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/6.x/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'pharmaciec';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'id',
        'adress',
        'ville',
        'amplitude',
        'attitude',
        'user',
        'nom',

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
    public function livrer(){
        return $this->belongsTo(User ::class ,'user');
    }
}
