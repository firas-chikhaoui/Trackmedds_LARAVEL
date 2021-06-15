<?php

namespace App\Models\RoleUser\Traits;

/**
 * Class RoleUserAttribute.
 */
trait RoleUserAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn"> {$this->getEditButtonAttribute("edit-roleuser", "admin.roleusers.edit")}
                {$this->getDeleteButtonAttribute("delete-roleuser", "admin.roleusers.destroy")}
                </div>';
    }
}
