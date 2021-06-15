<?php


namespace App\Models\CommandeMapProviders;
use App\Models\BaseModel;

class CommandeMapProvider extends BaseModel
{
    protected $table = 'commandes_map_providers';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}