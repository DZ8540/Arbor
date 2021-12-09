<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
  public function services()
  {
    return $this->hasMany(Service::class, 'order_product_id');
  }
}
