<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\NewsRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\News;

class NewsController extends CartController
{
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

		return view('User.News.news', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $this->get_products_from_cart(),
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

		return view('User.News.news_item', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $this->get_products_from_cart(),
			'news' => $news
		]);
	}
}
