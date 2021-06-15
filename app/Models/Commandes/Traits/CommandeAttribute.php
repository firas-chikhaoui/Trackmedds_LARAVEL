<?php

namespace App\Models\Commandes\Traits;

/**
 * Class CommandeAttribute.
 */
trait CommandeAttribute
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
        '.$this->getViewButtonAttribute().'
                
               
                </div>';
    }
    public function getViewButtonAttribute()
    {
        return '<a target="_blank" href="'.route('frontend.commandes.show', $this->id).'" class="btn btn-flat btn-default">
                    <i data-toggle="tooltip" data-placement="top" title="Commandes Details" class="fa fa-eye"></i>
                </a>';
    }
    public function isActive()
    {
        return $this->etat == 1;
    }
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<label class='label label-success'>".trans('labels.general.Livred').'</label>';
        }

        return "<label class='label label-danger'>".trans('labels.general.Not Livred').'</label>';
    }
}
