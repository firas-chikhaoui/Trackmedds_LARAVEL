<?php

namespace App\Models\Reclamations;

use App\Models\BaseModel;
use App\Models\Reclamations\Traits\Attribute\ReclamationAttribute;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reclamation extends BaseModel
{
    use ModelTrait,
        SoftDeletes,
        ReclamationAttribute {
            // FaqAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

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
    protected $fillable = ['name', 'email', 'status', 'phone', 'subject', 'message', 'pharmacie', 'medicament'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.reclamations.table');
    }
}
