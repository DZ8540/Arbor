<?php

namespace App\Http\Providers\User;

use App\Mail\OrderMailer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;

class OrderProvider extends CartProvider
{
  public function order_add($data)
  {
    $cart = $this->get_products_from_cart();
    $data['package_count'] = $cart['total_count'];
    
    $order_item = Order::create($data);

    foreach ($cart['products'] as $item) {
      $order_item->products()->attach($item->id, ['count' => $item->cart_count]);
      $order_product = OrderProduct::latest()->select('id')->first()->id;

      foreach ($item->services as $service_item) {
        $data = [
          'side_a' => $service_item->sides->sideA,
          'side_b' => $service_item->sides->sideB,
          'side_c' => $service_item->sides->sideC,
          'side_d' => $service_item->sides->sideD,
          'count' => $service_item->count,
          'order_product_id' => $order_product
        ];

        Service::create($data);
      }
    }

    Mail::to($data['email'])->send(new OrderMailer($order_item));
    session()->flush();
  }
}
