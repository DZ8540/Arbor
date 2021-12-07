<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $fillable = ['side_a', 'side_b', 'side_c', 'side_d', 'count', 'order_product_id'];
}
