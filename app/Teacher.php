<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Teacher extends User
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'zona',
        'user_id',
    ];
}
