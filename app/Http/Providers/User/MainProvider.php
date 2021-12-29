<?php

namespace App\Http\Providers\User;

use App\Models\Banner;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;

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
		$categories = Category::select($categories_columns)->inRandomOrder()->take(4)->get();

    return compact('banners', 'banner_addition', 'news', 'categories');
  }

  public function services($category_id = null, $with_thicknesses = false, $with_colors = false)
  {
    $categories_columns = ['id', 'name'];
    $categories = Category::select($categories_columns);

    if ($with_thicknesses) {
      $products = $categories->where('id', $category_id)->get();
      dd($products);
      // $data['thicknesses'] = 
    }

    $data['categories'] = $categories->get();
    return $data;
  }

  public function search($search_text)
  {
    $products_columns = ['id', 'slug', 'name', 'price', 'code', 'format', 'image', 'views_count', 'category_id'];
    $products = Product::select($products_columns)->where('name', 'LIKE', "%{$search_text}%")->paginate(16);

    return $products;
  }
}
