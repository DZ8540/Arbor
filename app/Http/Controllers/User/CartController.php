<?php

namespace App\Http\Controllers\User;

use App\Http\Providers\User\CartProvider;
use Illuminate\Http\Request;

class CartController extends BaseController
{
  public function cart(CartProvider $provider)
  {
    $cart = $provider->get_products_from_cart();

		return view('User.cart', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $cart
		]);
	}

  public function add_to_cart(Request $request, CartProvider $provider, $product)
  {
    $services = json_decode($request->input('services_sides', "[]"));
    $count = $request->input('count', 1);

    $provider->store_cart($product, $count, $services);

    return redirect()->back();
  }

  public function remove_from_cart(Request $request, CartProvider $provider, $product)
  {
    $count = $request->input('count', 1);

    $provider->clean_cart($product, $count);
    
    return redirect()->back();
  }

  public function delete_from_cart(CartProvider $provider, $product)
  {
    $provider->clear_cart($product);
    
    return redirect()->back();
  }

  public function add_service(Request $request, CartProvider $provider, $service)
  {
    $product = $request->input('product', null);
    if ($product === null)
      return redirect()->back();

    $provider->add_service($product, $service);

    return redirect()->back();
  }

  public function remove_service(Request $request, CartProvider $provider, $service)
  {
    $product = $request->input('product', null);
    if (empty($product))
      return redirect()->back();

    $provider->remove_service($product, $service);
    
    return redirect()->back();
  }

  public function delete_service(Request $request, CartProvider $provider, $service)
  {
    $product = $request->input('product', null);
    if (empty($product))
      return redirect()->back();
    
    $provider->delete_service($product, $service);

    return redirect()->back();
  }
}
