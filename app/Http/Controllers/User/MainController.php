<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseController;
use App\Http\Requests\User\NewsRequest;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Color;
use App\Models\News;
use App\Models\Product;
use App\Models\Thickness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends BaseController
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

	public function news(NewsRequest $request)
  {
    $columns = ['slug', 'name', 'image', 'description', 'views_count', 'created_at'];
    $allNews = News::select($columns);

    $count = 4;
    if ($request->has('count'))
      $count = $request->count;

    $news = $allNews;
    if ($request->has('date') && $request->date != 'reset')
      $news = $news->whereYear('created_at', '<=', $request->date);

    $popularNews = collect($allNews->get())->sortBy('views_count')->reverse(); // TODO: перевести это в scope запрос в модели

    if ($request->ajax()) {
      $old_count = $count;
      $count = $count * $request->page;
      $ajaxNews = $news->skip($count)->take($old_count)->get();

      foreach ($ajaxNews as $item) {
        $item->image = Storage::url($item->image);
        $item->itemDate = $item->date; // itemDate, because item has date getter in his model
        $item->route = route('user.news.item', $item->slug);
      }

      return response()->json($ajaxNews);
    }

    $news = $news->paginate($count);

		return view('User.news', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'popularNews' => $popularNews,
      'news' => $news,
      'count' => $count,
      'date' => $request->date
		]);
	}

	public function news_item($slug)
  {
		$columns = ['id', 'name', 'image', 'description', 'views_count', 'created_at'];
		$news = News::select($columns)->firstWhere('slug', $slug);
    $news->increment('views_count');

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

	public function category(Request $request, Category $slug)
  {
    $products_columns = ['slug', 'name', 'price', 'code', 'format', 'image', 'views_count', 'color_id', 'thickness_id'];
    $products = Product::select($products_columns)->where('category_id', $slug->id); 

    $colors_columns = ['id', 'slug', 'name', 'hex_code'];
    $colors = Color::select($colors_columns)->toBase()->get(); // TODO: сократить {
    foreach ($colors as $item) {
      $item->checked = false;
    }
    if (!empty(json_decode($request->colors))) {
      $val = json_decode($request->colors);
      $query = [];

      foreach ($val as $item) {
        $query[] = $item;
        $colors->where('id', $item)->map(function($val) {
          $val->checked = true;
        });
      }
      
      $products = $products->whereIn('color_id', $query);
    } else {
      $request->colors = '[]';
    } // }
    
    $thicknesses_columns = ['id', 'slug', 'name']; // TODO: сократить {
    $thicknesses = Thickness::select($thicknesses_columns)->toBase()->get();
    foreach ($thicknesses as $item) {
      $item->checked = false;
    }
    if (!empty(json_decode($request->thicknesses))) {
      $val = json_decode($request->thicknesses);
      $query = [];

      foreach ($val as $item) {
        $query[] = $item;
        $thicknesses->where('id', $item)->map(function($val) {
          $val->checked = true;
        });
      }

      $products = $products->where('thickness_id', $query);
    } else {
      $request->thicknesses = '[]';
    } // }

    $popul_sort = 'popul';
    $words_sort = 'words';
    $price_sort = 'price';
    $sorts = [
      [
        'name' => 'По популярности',
        'value' => $popul_sort
      ],
      [
        'name' => 'По алфавиту',
        'value' => $words_sort
      ],
      [
        'name' => 'По цене',
        'value' => $price_sort
      ]
    ];
    if ($request->has('sort')) {
      switch ($request->sort) {
        case $popul_sort:
          $products = $products->orderBy('views_count', 'desc');
          break;

        case $words_sort:
          $products = $products->orderBy('name', 'desc');
          break;

        case $price_sort:
          $products = $products->orderBy('price', 'desc');
          break;
      }
    }

    $show_count = 16;
    if ($request->filled('show_count'))
      $show_count = $request->show_count;

    if ($request->ajax()) {
      $old_count = $show_count;
      $show_count = $show_count * $request->page;
      $ajaxProducts = $products->skip($show_count)->take($old_count)->get();

      foreach ($ajaxProducts as $item) {
        $item->image = Storage::url($item->image);
        $item->route = route('user.product', [$slug->slug, $item->slug]);
      }

      return response()->json($ajaxProducts);
    }

    $query_string = "?sort={$request->sort}&show_count={$show_count}&colors={$request->colors}&thicknesses={$request->thicknesses}";
    $products = $products->paginate($show_count)->withQueryString($query_string);

    $current_page = 1;
    if ($request->has('page'))
      $current_page = $request->page;

		return view('User.category', [
      'sorts' => $sorts,
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'category' => $slug,
      'colors' => $colors,
      'thicknesses' => $thicknesses,
      'products' => $products,
      'show_count' => $show_count,
      'sort' => $request->sort,
      'form_colors' => $request->colors,
      'form_thicknesses' => $request->thicknesses,
      'current_url' => $query_string,
      'current_page' => $current_page
		]);
	}

	public function product(Category $category_slug, Product $product_slug)
  {
    $other = $category_slug->products->random(6);

		return view('User.product', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'product' => $product_slug,
      'other' => $other,
      'category' => $category_slug
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