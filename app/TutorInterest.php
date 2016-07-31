<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorInterest extends Model
{
    protected $fillable = [
        'student_id','tutor_id','status'
    ];
}