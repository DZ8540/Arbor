<?php

namespace App\Http\Providers\User;

use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsProvider extends CartProvider
{
  public function news($count, $date, $for_ajax = false)
  {
    $columns = ['slug', 'name', 'image', 'description', 'views_count', 'created_at'];
    $allNews = News::select($columns);

    $news = $allNews;
    if ($date != 'reset')
      $news = $news->whereYear('created_at', '<=', $date);

    if ($for_ajax)
      return $news;

    $popular_news = collect($allNews->get())->sortBy('views_count')->reverse(); // TODO: перевести это в scope запрос в модели
    $news = $news->paginate($count);

    return compact('news', 'popular_news');
  }

  public function ajax($count, $page, $date)
  {
    $old_count = $count;
    $count = $count * $page;

    $news = $this->news($count, $date, true);

    $ajax_news = $news->skip($count)->take($old_count)->get();
    foreach ($ajax_news as $item) {
      $item->image = Storage::url($item->image);
      $item->itemDate = $item->date; // itemDate, because item has date getter in his model
      $item->route = route('user.news.item', $item->slug);
    }

    return $ajax_news;
  }

  public function news_item($slug)
  {
    $columns = ['id', 'slug', 'name', 'image', 'description', 'views_count', 'created_at'];
		$news = News::select($columns)->firstWhere('slug', $slug);
    $news->increment('views_count');

    return $news;
  }
}
