<?php

namespace App\Models\Providers\Traits;

/**
 * Class ProviderAttribute.
 */
trait ProviderAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-provider", "admin.providers.edit").'
                '.$this->getDeleteButtonAttribute("delete-provider", "admin.providers.destroy").'
                </div>';
    }
}
