<?php

namespace App\Models\Providers;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Providers\Traits\ProviderAttribute;
use App\Models\Providers\Traits\ProviderRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;
class Provider extends Model
{
    use ModelTrait,
        ProviderAttribute,
        SoftDeletes,
    	ProviderRelationship {
            // ProviderAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'providers';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
       'nprovider',
        'adresse',
        'tel',
        'classf',
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
