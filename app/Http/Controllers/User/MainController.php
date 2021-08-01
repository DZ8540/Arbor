<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseController;
use Illuminate\Http\Request;

class MainController extends BaseController
{
	public function index()
  {
		return view('User.index');
	}

	public function about()
  {
		return view('User.about');
	}

	public function services()
  {
		return view('User.services');
	}

	public function news()
  {
		return view('User.news');
	}

	public function news_item($slug = null)
  {
		return view('User.news_item', compact('slug'));
	}

	public function catalog()
  {
		return view('User.catalog');
	}

	public function category($slug = null)
  {
		return view('User.category', compact('slug'));
	}

	public function product($category_slug = null, $product_slug = null)
  {
		return view('User.product', compact('category_slug', 'product_slug'));
	}

	public function cart()
  {
		return view('User.cart');
	}

	public function order()
  {
		return view('User.order');
	}
}