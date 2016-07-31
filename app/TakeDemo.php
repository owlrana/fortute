<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TakeDemo extends Model
{
    protected $fillable = [
        'student_id','tutor_id','demo_date',
    ];
}
