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
        'company_id',
        'fname',
        'lname',
        'email',
        'mobile',
        'password',
        'status',
        'address',
        'userpic',
        'is_email_verified',
        'remember_token'
    ];
      protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

  

}
