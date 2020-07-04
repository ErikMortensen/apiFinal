<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    const ROL_STUDENT = 'studen';
    const ROL_TEACHER = 'teacher';
    const ROL_ADMIN = 'admin';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'email_verified_at',
        'password',
        'verified',
        'verification_token',
        'imagen',
        'rol',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'verification_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function esStudent(){
        return $this->rol == User::ROL_STUDENT;
    }

    public function esTeacher(){
        return $this->rol == User::ROL_TEACHER;
    }

    public function esAdmin(){
        return $this->rol == User::ROL_ADMIN;
    }
}
