<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\OrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Service;

class OrderController extends CartController

{
  public function order()
  {
		return view('User.order', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $this->get_products_from_cart(),
		]);
	}

  public function order_add(OrderRequest $request, Order $order, Service $service)
  {
    $cart = $this->get_products_from_cart();
    $data = $request->except(['check', '_token']);
    $data['package_count'] = $cart['total_count'];
    
    $order_item = $order->create($data);

    foreach ($cart['products'] as $item) {
      $order_item->products()->attach($item->id);
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

        $service->create($data);
      }
    }

    $request->session()->flush();
    return redirect()->route('user.index');
  }
}
