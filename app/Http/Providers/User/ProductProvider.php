<?php

namespace App\Http\Providers\User;

use App\Models\Color;
use App\Models\Product;
use App\Models\Thickness;
use Illuminate\Support\Facades\Storage;

class ProductProvider extends CartProvider
{
  public function category($category, $input_colors, $input_thicknesses, $sort, $show_count, $for_ajax = false)
  {
    $products_columns = ['id', 'slug', 'name', 'price', 'code', 'format', 'image', 'views_count', 'color_id', 'thickness_id'];
    $products = Product::select($products_columns)->where('category_id', $category->id);

    $colors_columns = ['id', 'slug', 'name', 'hex_code'];
    $colors = Color::select($colors_columns)->toBase()->get(); // TODO: сократить {
    foreach ($colors as $item) {
      $item->checked = false;
    }
    if (!empty(json_decode($input_colors))) {
      $val = json_decode($input_colors);
      $query = [];

      foreach ($val as $item) {
        $query[] = $item;
        $colors->where('id', $item)->map(function($val) {
          $val->checked = true;
        });
      }
      
      $products = $products->whereIn('color_id', $query);
    } // }

    $thicknesses_columns = ['id', 'slug', 'name']; // TODO: сократить {
    $thicknesses = Thickness::select($thicknesses_columns)->toBase()->get();
    foreach ($thicknesses as $item) {
      $item->checked = false;
    }
    if (!empty(json_decode($input_thicknesses))) {
      $val = json_decode($input_thicknesses);
      $query = [];

      foreach ($val as $item) {
        $query[] = $item;
        $thicknesses->where('id', $item)->map(function($val) {
          $val->checked = true;
        });
      }

      $products = $products->where('thickness_id', $query);
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

    if ($sort) {
      switch ($sort) {
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

    if ($for_ajax)
      return $products; 

    $query_string = "?sort={$sort}&show_count={$show_count}&colors={$colors}&thicknesses={$thicknesses}";
    $products = $products->paginate($show_count)->withQueryString($query_string);
    
    return compact('products', 'query_string', 'sorts', 'colors', 'thicknesses');
  }

	public function product($category)
  {
    $count = count($category->products);
    if ($count >= 6)
      $count = 6;

    return $category->products->random($count);
  }

  public function ajax($show_count, $page, $category, $colors, $thicknesses, $sort)
  {
    $old_count = $show_count;
    $show_count = $show_count * $page;

    $products = $this->category($category, $colors, $thicknesses, $sort, $show_count, true);
    dd($products);
    $ajaxProducts = $products->skip($show_count)->take($old_count)->get();

    foreach ($ajaxProducts as $item) {
      $item->image = Storage::url($item->image);
      $item->route = route('user.product', [$category->slug, $item->slug]);
    }

    return response()->json($ajaxProducts);
  }
}
