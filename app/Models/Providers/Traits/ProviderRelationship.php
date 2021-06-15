<?php

namespace App\Models\Providers\Traits;

/**
 * Class ProviderRelationship
 */
trait ProviderRelationship
{
    public function commande()
    {
        return $this->belongsTo('App\Commande');
    }
}
