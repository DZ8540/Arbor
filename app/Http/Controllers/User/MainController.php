<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseController;
use App\Models\Banner;
use App\Models\BannersAddition;

class MainController extends BaseController
{
	public function index()
  {
		$banners_columns = ['title', 'description', 'link', 'image'];
		$banners = Banner::select($banners_columns)->get();

		$banner_addition_columns = ['title', 'description', 'link'];
		$banner_addition = BannersAddition::select($banner_addition_columns)->toBase()->first();

		return view('User.index', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
			'categories' => $this->categories,
			'banners' => $banners,
			'banner_addition' => $banner_addition
		]);
	}

	public function about()
  {
		return view('User.about', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types
		]);
	}

	public function services()
  {
		return view('User.services', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types
		]);
	}

	public function news()
  {
		return view('User.news', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types
		]);
	}

	public function news_item($slug = null)
  {
		return view('User.news_item', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types
		]);
	}

	public function catalog()
  {
		return view('User.catalog', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types
		]);
	}

	public function category($slug = null)
  {
		return view('User.category', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types
		]);
	}

	public function product($category_slug = null, $product_slug = null)
  {
		return view('User.product', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types
		]);
	}

	public function cart()
  {
		return view('User.cart', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types
		]);
	}

	public function order()
  {
		return view('User.order', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types
		]);
	}
}