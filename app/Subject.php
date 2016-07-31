<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
     protected $fillable = [
        'subjects','grade_id'
    ];

    public $timestamps = false;
}
