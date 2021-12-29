<?php

namespace App\Http\Controllers\User;

use App\Http\Providers\User\ServiceProvider;
use Illuminate\Http\Request;

class ServiceController extends CartController
{
  public function services(ServiceProvider $provider)
  {
    $categories = $provider->services();

		return view('User.services', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $provider->get_products_from_cart(),
      'categories' => $categories
		]);
	}

  public function get_services_data(Request $request, ServiceProvider $provider)
  {
    $data = $provider->get_services_data($request->category_id, true, $request->input('with_colors', false));
    return response()->json($data);
  }
}
