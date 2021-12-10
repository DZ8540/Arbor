<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\News;
use App\Models\NewsImages;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class NewsController extends BaseController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $columns = ['id', 'slug', 'name', 'image', 'created_at'];
    $news = News::select($columns)->paginate(20);
    return view('Admin.News.index', compact('news'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('Admin.News.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(NewsRequest $request)
  {
    $params = $request->all();

    if ($request->has('image')) {
      $path = $request->file('image')->store("public/News/{$params['slug']}");
      $params['image'] = $path;
    }

    $news = News::create($params);

		if ($request->has('gallery')) {
			foreach ($params['gallery'] as $item) {
				$path = Storage::putFile("public/News/{$params['slug']}/Images", new File($item));
				$image = [
					'image' => $path,
					'news_id' => $news->id
				];
				NewsImages::create($image);
			}
		}

    return redirect()->route('admin.news.index')->with('success', 'Новость была успешно добавлена');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\News  $news
   * @return \Illuminate\Http\Response
   */
  public function show(News $news)
  {
    return view('Admin.News.show', compact('news'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\News  $news
   * @return \Illuminate\Http\Response
   */
  public function edit(News $news)
  {
    return view('Admin.News.edit', compact('news'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\News  $news
   * @return \Illuminate\Http\Response
   */
  public function update(NewsRequest $request, News $news)
  {
    $params = $request->all();

    if ($request->has('image')) {
      Storage::delete($news->image);
      $path = $request->file('image')->store("public/News/{$params['slug']}");
      $params['image'] = $path;
    }

    $news->update($params);

		if ($request->has('gallery')) {
			foreach ($news->newsImages as $item) {
				Storage::delete($item->image);
				$item->delete();
			}

			foreach ($params['gallery'] as $item) {
				$path = Storage::putFile("public/News/{$params['slug']}/Images", new File($item));
				$arr = [
					'image' => $path,
					'news_id' => $news->id
				];
				NewsImages::create($arr);
			}
		}

    return redirect()->route('admin.news.index')->with('success', 'Новость была успешно изменена');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\News  $news
   * @return \Illuminate\Http\Response
   */
  public function destroy(News $news)
  {
    $news->delete();
    return redirect()->route('admin.news.index')->with('danger', 'Новость была удалена');
  }
}
