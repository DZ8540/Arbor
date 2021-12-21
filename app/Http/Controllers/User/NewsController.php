<?php

namespace App\Http\Controllers\User;

use App\Http\Providers\User\NewsProvider;
use App\Http\Requests\User\NewsRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\News;

class NewsController extends CartController
{
  public function news(NewsRequest $request, NewsProvider $provider)
  {
    $count = $request->input('count', 4);
    $date = $request->input('date', 'reset');
    $page = $request->page;

    if ($request->ajax()) {
      $ajax_news = $provider->ajax($count, $page, $date);
      return response()->json($ajax_news);
    }
    
    $all_news = $provider->news($count, $date);
    $news = $all_news['news'];
    $popular_news = $all_news['popular_news'];

		return view('User.News.news', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $provider->get_products_from_cart(),
      'popularNews' => $popular_news,
      'news' => $news,
      'count' => $count,
      'date' => $request->date
		]);
	}

	public function news_item(NewsProvider $provider, $slug)
  {
		$news = $provider->news_item($slug);

		return view('User.News.news_item', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $provider->get_products_from_cart(),
			'news' => $news
		]);
	}
}
