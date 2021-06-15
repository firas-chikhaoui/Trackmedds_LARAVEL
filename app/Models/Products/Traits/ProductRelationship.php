<?php

namespace App\Models\Products\Traits;

/**
 * Class ProductRelationship
 */
trait ProductRelationship
{
    public function commande()
    {
        return $this->belongsTo('App\Commande');
    }
}
