<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    protected $fillable = [
        'student_id','tutor_id',
    ];

    public $timestamps = false;
}
