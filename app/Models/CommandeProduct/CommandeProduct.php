<?php


namespace App\Models\CommandeProduct;
use App\Models\BaseModel;

class CommandeProduct extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'commande_product';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}