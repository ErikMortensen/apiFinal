<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    const USUARIO_STUDENT = 'studen';
    const USUARIO_TEACHER = 'teacher';
    const USUARIO_ADMIN = 'admin';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'password',
        'email_verified_at',
       
        'remember_token',
        'imagen',
        'rol',
    ];
 // 'verification_token',

 
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
        return $this->rol == User::USUARIO_STUDENT;
    }

    public function esTeacher(){
        return $this->rol == User::USUARIOTEACHER;
    }

    public function esAdmin(){
        return $this->rol == User::USUARIO_ADMIN;
    }
}
