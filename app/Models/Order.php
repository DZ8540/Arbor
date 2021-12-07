<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
    'payer_type', 'name', 'email',
    'phone', 'location', 'index',
    'company_name', 'address', 'individual_tax_number',
    'reason_code', 'comment', 'delivery_type',
    'delivery_address', 'delivery_comment', 'pay_type',
    'package_count', 'price'
  ];

  public function products()
  {
    return $this->belongsToMany(Product::class)->withPivot('id')->withTimestamps();
  }
}
