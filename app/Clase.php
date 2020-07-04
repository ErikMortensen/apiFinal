<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = [
        'fecha_hora',
        'duracion',
        'cant_alumnos',
        'direccion',
        'student_id',
        'transaccion',
        'materia_teacher_id',
        'descripcion',
        'observaciones',
    ];
}
