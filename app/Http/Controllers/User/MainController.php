<?php

namespace App\Http\Controllers\User;

use App\Models\Banner;
use App\Models\Category;
use App\Models\News;

class MainController extends CartController
{
  public function index()
  {
		$banners_columns = ['title', 'description', 'link', 'image'];
		$banners = Banner::where('is_additional', '0')->select($banners_columns)->get();

		$banner_addition_columns = ['title', 'description', 'link'];
		$banner_addition = Banner::where('is_additional', '1')->select($banner_addition_columns)->toBase()->first();

		$news_columns = ['slug', 'image', 'name', 'created_at'];
		$news_count = 20;
		$news = News::select($news_columns)->take($news_count)->get();

    $categories_columns = ['slug', 'name', 'image'];
		$categories = Category::select($categories_columns)->take(8)->toBase()->get();

		return view('User.index', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $this->get_products_from_cart(),
			'categories' => $categories,
			'banners' => $banners,
			'banner_addition' => $banner_addition,
			'news' => $news
		]);
	}

	public function about()
  {
		return view('User.about', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $this->get_products_from_cart(),
		]);
	}

	public function services()
  {
		return view('User.services', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $this->get_products_from_cart(),
		]);
	}

	public function order()
  {
		return view('User.order', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $this->get_products_from_cart(),
		]);
	}
}