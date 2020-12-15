<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\{
  BelongsToMany
};

class Tag extends Model
{
  use HasFactory;

  protected $table = 'tag';

  #region   ----------Relations----------
  public function companies() : BelongsToMany
  {
    return $this->belongsToMany(Company::class, 'companies_tags', 'tag_id', 'company_id');
  }
  #endregion
}
