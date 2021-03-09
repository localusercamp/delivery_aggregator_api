<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Extentions\JWTSubjectExtention;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

use Illuminate\Database\Eloquent\Relations\{
  BelongsTo,
  BelongsToMany,
  HasMany,
  HasOne
};

class User extends Authenticatable implements JWTSubject
{
  use HasFactory, Notifiable, JWTSubjectExtention;

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


  #region   ----------Computors----------
  public function isAdmin() : bool
  {
    return $this->role_id === Role::ADMIN;
  }

  public function isModerator() : bool
  {
    return $this->role_id === Role::MODERATOR;
  }

  public function isProvider() : bool
  {
    return $this->role_id === Role::PROVIDER;
  }

  public function isClient() : bool
  {
    return $this->role_id === Role::CLIENT;
  }
  #endregion


  #region   ----------Scopes----------
  public function scopeAdmins(EloquentBuilder $query): EloquentBuilder
  {
    return $query->where('role_id', Role::ADMIN);
  }

  public function scopeModerators(EloquentBuilder $query): EloquentBuilder
  {
    return $query->where('role_id', Role::MODERATOR);
  }

  public function scopeProviders(EloquentBuilder $query): EloquentBuilder
  {
    return $query->where('role_id', Role::PROVIDER);
  }

  public function scopeClients(EloquentBuilder $query): EloquentBuilder
  {
    return $query->where('role_id', Role::CLIENT);
  }
  #endregion


  #region   ----------Relations----------
  public function role() : BelongsTo
  {
    return $this->belongsTo(Role::class, 'role_id', 'id');
  }

  public function city() : BelongsTo
  {
    return $this->belongsTo(City::class, 'city_id', 'id');
  }

  public function orders() : HasMany
  {
    return $this->hasMany(Order::class, 'client_id', 'id');
  }

  public function company() : HasOne
  {
    return $this->hasOne(Company::class, 'owner_id', 'id');
  }
  #endregion
}
