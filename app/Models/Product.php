<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\{
  BelongsTo,
  BelongsToMany,
  HasMany,
  HasOne,
};

class Product extends Model
{
  use HasFactory;

  protected $table = 'product';

  protected $fillable = [
    'title',
    'description',
    'price',
  ];



  #region   ----------Relations----------
  public function creator() : BelongsTo
  {
    return $this->belongsTo(User::class, 'creator_id', 'id');
  }

  public function company() : BelongsTo
  {
    return $this->belongsTo(Company::class, 'company_id', 'id');
  }

  public function category() : BelongsTo
  {
    return $this->belongsTo(Category::class, 'category_id', 'id');
  }

  public function tags() : BelongsToMany
  {
    return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
  }

  public function poster() : HasOne
  {
    return $this->hasOne(Image::class, 'id', 'poster_id');
  }
  #endregion
}
