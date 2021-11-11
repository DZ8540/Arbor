<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseController;
use App\Http\Requests\User\NewsRequest;
use App\Models\Banner;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
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
		$categories = Category::select($categories_columns)->toBase()->get();

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

    $popularNews = collect($allNews->get())->sortBy('views_count')->reverse();
    $news = $news->paginate($count);

    if ($request->ajax()) {
      $old_count = $count;
      $count = $count * $request->page;
      $ajaxNews = $allNews->skip($count)->take($old_count)->get();

      foreach ($ajaxNews as $item) {
        $item->image = Storage::url($item->image);
        $item->itemDate = $item->date; // itemDate, because item has date getter in his model
        $item->route = route('user.news.item', $item->slug);
      }

      return response()->json($ajaxNews);
    }

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

    $news->views_count = ++$news->views_count;
    $news->save();

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