<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
      protected $fillable = [
        'rate',
        'systolic',
        'diastolic',
      ];


      protected $casts = [
        'id' => 'integer',
      ];
}
