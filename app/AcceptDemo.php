<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptDemo extends Model
{
    protected $fillable = [
        'student_id','tutor_id',
    ];
}
