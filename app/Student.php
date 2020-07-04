<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Student extends User
{
    protected $fillable = [
        'institucion',
        'carrera',
    ];
}
