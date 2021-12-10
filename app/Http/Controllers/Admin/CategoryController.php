<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Support\Facades\Storage;

class CategoryController extends BaseController
{
  public $directory = 'public/Categories';

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
    $columns = ['id', 'slug', 'name', 'category_type_id'];
		$categories = Category::select($columns)->with(['category_type:id,name'])->paginate(20);
		return view('Admin.Categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
    $columns = ['id', 'name'];
		$category_types = CategoryType::select($columns)->toBase()->get();
		return view('Admin.Categories.create', compact('category_types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CategoryRequest $request)
	{
		$params = $request->all();

		if ($request->has('image')) {
			$path = $request->file('image')->store("{$this->directory}");
			$params['image'] = $path;
		}

		Category::create($params);
		return redirect()->route('admin.categories.index')->with('success', 'Категория успешно добавлена');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function show(Category $category)
	{
		return view('Admin.Categories.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Category $category)
	{
    $columns = ['id', 'name'];
    $category_types = CategoryType::select($columns)->toBase()->get();
    return view('Admin.Categories.edit', compact('category', 'category_types'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function update(CategoryRequest $request, Category $category)
	{
    $params = $request->all();
    
		if ($request->has('image')) {
      Storage::delete($category->image);
			$path = $request->file('image')->store("{$this->directory}");
			$params['image'] = $path;
		}

		$category->update($params);
		return redirect()->route('admin.categories.index')->with('success', 'Категория успешно изменена');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Category $category)
	{
    Storage::delete($category->image);
    $category->delete();
		return redirect()->route('admin.categories.index')->with('danger', 'Категория удалена');
	}
}