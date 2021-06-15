<?php

namespace App\Models\Access\Role;

use App\Models\Access\Role\Traits\Attribute\RoleAttribute;
use App\Models\Access\Role\Traits\Relationship\RoleRelationship;
use App\Models\Access\Role\Traits\RoleAccess;
use App\Models\Access\Role\Traits\Scope\RoleScope;
use App\Models\BaseModel;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role.
 */
class Role extends BaseModel
{
    use RoleScope,
        ModelTrait,
        RoleAccess,
        RoleRelationship;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'all', 'sort'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.roles_table');
    }
    public function getEditButtonAttribute()
    {
        if (access()->allow('edit-role')) {
            return '<a class="btn btn-flat btn-default" href="'.route('admin.access.role.edit', $this).'">
                    <i data-toggle="tooltip" data-placement="top" title="Edit" class="fa fa-pencil"></i>
                </a>';
        }
    }
    public function getDeleteButtonAttribute()
    {
        //Can't delete master admin role
        if ($this->id != 1 && access()->allow('delete-role')) {
            return '<a class="btn btn-flat btn-default" href="'.route('admin.access.role.destroy', $this).'" data-method="delete"
                        data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                        data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                        data-trans-title="'.trans('strings.backend.general.are_you_sure').'">
                            <i data-toggle="tooltip" data-placement="top" title="Delete" class="fa fa-trash"></i>
                    </a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                    '.$this->getEditButtonAttribute('edit-role', 'admin.access.role.edit').'
                    '.$this->getDeleteButtonAttribute().'
                </div>';
    }
}