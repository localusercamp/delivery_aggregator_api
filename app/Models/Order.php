<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Events\CollectOrderPricesEvent;

use Illuminate\Database\Eloquent\Relations\{
  BelongsTo,
};

class Order extends Model
{
  use HasFactory;

  protected $table = 'order';

  public $timestamps = false;

  protected $dispatchesEvents = [
    'creating' => CollectOrderPricesEvent::class,
    // 'deleted' => UserDeleted::class,
  ];



  #region   ----------Relations----------
  public function client() : BelongsTo
  {
    return $this->belongsTo(User::class, 'client_id', 'id');
  }
  #endregion
}
