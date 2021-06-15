<?php

namespace App\Models\Pharmacies\Traits;

/**
 * Class PharmacyAttribute.
 */
trait PharmacyAttribute
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
                '.$this->getEditButtonAttribute("edit-pharmacy", "admin.pharmacies.edit").'
                '.$this->getDeleteButtonAttribute("delete-pharmacy", "admin.pharmacies.destroy").'
                </div>';
    }
}
