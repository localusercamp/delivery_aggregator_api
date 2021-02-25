<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
  BelongsTo,
  BelongsToMany,
  HasMany,
  HasOne,
};

use App\Collections\ProductCollection;

class Product extends Model
{
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
    return $this->hasOne(Poster::class, 'id', 'poster_id');
  }
  #endregion

  public function newCollection(array $models = []) : ProductCollection
  {
    return new ProductCollection($models);
  }
}
