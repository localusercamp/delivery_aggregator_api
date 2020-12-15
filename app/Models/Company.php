<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\{
  BelongsToMany,
  HasMany
};

class Company extends Model
{
  use HasFactory;

  protected $table = 'company';

  #region   ----------Relations----------
  public function tags() : BelongsToMany
  {
    return $this->belongsToMany(Tag::class, 'companies_tags', 'company_id', 'tag_id');
  }

  public function products() : HasMany
  {
    return $this->hasMany(Product::class, 'company_id', 'id');
  }
  #endregion
}
