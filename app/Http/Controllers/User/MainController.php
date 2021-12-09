<?php

namespace App\Http\Controllers\User;

use App\Http\Providers\User\MainProvider;

class MainController extends CartController
{
  public function index(MainProvider $provider)
  {
		$data = $provider->index();

		return view('User.index', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $provider->get_products_from_cart(),
			'categories' => $data['categories'],
			'banners' => $data['banners'],
			'banner_addition' => $data['banner_addition'],
			'news' => $data['news']
		]);
	}

	public function about(MainProvider $provider)
  {
		return view('User.about', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $provider->get_products_from_cart(),
		]);
	}

	public function services(MainProvider $provider)
  {
		return view('User.services', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $provider->get_products_from_cart(),
		]);
	}
}