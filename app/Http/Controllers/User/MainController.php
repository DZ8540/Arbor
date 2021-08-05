<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseController;
use App\Models\Banner;
use App\Models\BannersAddition;
use App\Models\News;

class MainController extends BaseController
{
	public function index()
  {
		$banners_columns = ['title', 'description', 'link', 'image'];
		$banners = Banner::select($banners_columns)->get();

		$banner_addition_columns = ['title', 'description', 'link'];
		$banner_addition = BannersAddition::select($banner_addition_columns)->toBase()->first();

		$news_columns = ['slug', 'image', 'name', 'created_at'];
		$news_count = 20;
		$news = News::select($news_columns)->take($news_count)->get();

		return view('User.index', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
			'categories' => $this->categories,
			'banners' => $banners,
			'banner_addition' => $banner_addition,
			'news' => $news
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

	public function news_item($slug)
  {
		$columns = ['id', 'name', 'image', 'description', 'created_at'];
		$news = News::select($columns)->firstWhere('slug', $slug);
		return view('User.news_item', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
			'news' => $news
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