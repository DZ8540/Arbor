<?php

namespace App\Http\Controllers\User;

use App\Http\Providers\User\ProductProvider;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Thickness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends CartController
{
  public function catalog(ProductProvider $provider)
  {
		return view('User.Product.catalog', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $provider->get_products_from_cart()
		]);
	}

	public function category(Request $request, ProductProvider $provider, Category $slug)
  {
    $products_columns = ['id', 'slug', 'name', 'price', 'code', 'format', 'image', 'views_count', 'color_id', 'thickness_id'];
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

		return view('User.Product.category', [
      'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $provider->get_products_from_cart(),
      'sorts' => $sorts,
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

	public function product(ProductProvider $provider, Category $category_slug, Product $product_slug)
  {
    $other = $provider->product($category_slug);

		return view('User.Product.product', [
			'about_company' => $this->about_company,
			'category_types' => $this->category_types,
      'cart' => $provider->get_products_from_cart(),
      'product' => $product_slug,
      'other' => $other,
      'category' => $category_slug,
		]);
	}
}
