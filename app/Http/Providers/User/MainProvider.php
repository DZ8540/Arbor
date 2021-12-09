<?php

namespace App\Http\Providers\User;

use App\Models\Banner;
use App\Models\Category;
use App\Models\News;

class MainProvider extends CartProvider
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
		$categories = Category::select($categories_columns)->inRandomOrder()->take(4)->toBase()->get();

    return compact('banners', 'banner_addition', 'news', 'categories');
  }
}
