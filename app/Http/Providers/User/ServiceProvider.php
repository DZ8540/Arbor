<?php

namespace App\Http\Providers\User;

use App\Models\Category;

class ServiceProvider extends CartProvider
{
  public function services()
  {
    $categories_columns = ['id', 'name'];
    $categories = Category::select($categories_columns)->get();
    
    return $categories;
  }

  public function get_services_data($category_id = null, $with_thicknesses = false, $with_colors = false)
  {
    $categories_columns = ['id', 'name'];
    $categories = Category::select($categories_columns);

    $thicknesses = [];
    $colors = [];
    if ($with_thicknesses) {
      $products = $categories->firstWhere('id', $category_id)->products;

      $thicknesses_ids = [];
      $color_ids = [];
      foreach ($products as $item) {

        $thickness = $item->thickness;
        if (!in_array($thickness->id, $thicknesses_ids)) {
          $thicknesses_ids[] = $thickness->id;

          $thicknesses[] = [
            'id' => $thickness->id,
            'name' => $thickness->name
          ];
        }

        $color = $item->color;
        if (!in_array($color->id, $color_ids)) {
          $color_ids[] = $color->id;

          $colors[] = [
            'id' => $color->id,
            'name' => $color->name
          ];
        }

      }
    }

    return [
      'thicknesses' => $thicknesses,
      'colors' => $colors
    ];
  }
}
