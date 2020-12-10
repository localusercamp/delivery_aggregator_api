<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
  use HasFactory, Notifiable;

  protected $table = 'user';

  protected $fillable = [
    'firstname',
    'lastname',
    'verification_token',
    'role_id',
    'reset_token',
  ];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * Get the identifier that will be stored in the subject claim of the JWT.
   */
  public function getJWTIdentifier()
  {
    return $this->getKey();
  }

  /**
   * Return a key value array, containing any custom claims to be added to the JWT.
   */
  public function getJWTCustomClaims()
  {
    return [];
  }
}
