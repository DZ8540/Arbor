<?php

namespace App\Http\Providers\User;

use App\Mail\CallModalMailer;
use App\Mail\FindProductMailer;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class ConsultProvider extends CartProvider
{
  public function call($call_email, $payload)
  {
    if ($call_email != null) {
      Mail::to($call_email)->send(new CallModalMailer($payload));
      return true;
    }

    return false;
  }

  public function find_product($call_email, $payload)
  {
    if ($call_email != null) {
      // $product_columns = ['name', 'article'];
      // $payload['product_item'] = Product::select($product_columns)->where('article', $payload['product'])->orWhere('name', 'LIKE', "%{$payload['product']}%")->first();

      Mail::to($call_email)->send(new FindProductMailer($payload));
      return true;
    }

    return false;
  }
}
