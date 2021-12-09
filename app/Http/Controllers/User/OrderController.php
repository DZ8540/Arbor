<?php

namespace App\Http\Controllers\User;

use App\Http\Providers\User\OrderProvider;
use App\Http\Requests\User\OrderRequest;

class OrderController extends CartController
{
  public function order(OrderProvider $provider)
  {
		return view('User.order', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $provider->get_products_from_cart(),
		]);
	}

  public function order_add(OrderRequest $request, OrderProvider $provider)
  {
    $data = $request->except(['check', '_token']);

    $provider->order_add($data);
    
    return redirect()->route('user.index');
  }
}
