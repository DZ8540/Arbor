<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\thickness;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$columns = ['id', 'slug', 'name', 'price', 'category_id', 'count', 'image'];
		$products = Product::select($columns)->get();
		return view('Admin.Products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$columns = ['id', 'name'];

		$categories = Category::select($columns)->toBase()->get();
		$manufacturers = Manufacturer::select($columns)->toBase()->get();
		$colors = Color::select($columns)->toBase()->get();
		$thicknesses = thickness::select($columns)->toBase()->get();

		return view('Admin.Products.create', compact('categories', 'manufacturers', 'colors', 'thicknesses'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ProductRequest $request)
	{
		$params = $request->all();

		if ($request->has('image')) {
			$path = $request->file('image')->store("public/Products/{$params['slug']}");
			$params['image'] = $path;
		}
		
		Product::create($params);
		return redirect()->route('admin.products.index')->with('success', 'Продукт успешно добавлен');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function show(Product $product)
	{
		return view('Admin.Products.show', compact('product'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Product $product)
	{
		$columns = ['id', 'name'];

		$categories = Category::select($columns)->toBase()->get();
		$manufacturers = Manufacturer::select($columns)->toBase()->get();
		$colors = Color::select($columns)->toBase()->get();
		$thicknesses = thickness::select($columns)->toBase()->get();

		return view('Admin.Products.edit', compact('product', 'categories', 'manufacturers', 'colors', 'thicknesses'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(ProductRequest $request, Product $product)
	{
		$params = $request->all();

		if ($request->has('image')) {
			Storage::delete($product->image);
			$path = $request->file('image')->store("public/Products/{$params['slug']}");
			$params['image'] = $path;
		}
		
		$product->update($params);
		return redirect()->route('admin.products.index')->with('success', 'Продукт успешно изменен');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product)
	{
		$product->delete();
		return redirect()->route('admin.products.index')->with('danger', 'Продукт был удален');
	}
}
