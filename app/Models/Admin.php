<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use HasFactory,Notifiable;
    protected $guard='admin';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'mobile',
        'password',
        'status',
        'remember_token'
    ];
      protected $hidden = [
        'password',
        'remember_token',
    ];


}
