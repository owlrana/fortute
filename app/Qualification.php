<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $fillable = [
        'user_id','qualifications','twelfth_marks','tenth_marks','college','course','batch'
    ];
    public $timestamps= false;
}
