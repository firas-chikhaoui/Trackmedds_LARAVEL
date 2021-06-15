<?php

namespace App\Models\Reclamations\Traits\Attribute;

/**
 * Class ReclamationAttribute.
 */
trait ReclamationAttribute
{
    /**
     * @return string
     */
    public function getStatusButtonAttribute()
    {
        switch ($this->status && access()->allow('edit-reclamation')) {
            case 0:
                return '<a href="'.route('admin.reclamations.mark', [$this, 1]).'" class="btn btn-flat btn-default"><i class="fa fa-check-square" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.access.users.traite').'"></i></a>';

            case 1:
                return '<a href="'.route('admin.reclamations.mark', [$this, 0]).'" class="btn btn-flat btn-default"><i class="fa fa-square" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.access.users.nontraite').'"></i></a>';

            default:
                return '';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<label class='label label-success'>".trans('labels.general.traite').'</label>';
        }

        return "<label class='label label-danger'>".trans('labels.general.nontraite').'</label>';
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status == 1;
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.
                $this->getStatusButtonAttribute().
                '</div>';
    }
}
