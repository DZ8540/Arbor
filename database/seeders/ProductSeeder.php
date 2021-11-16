<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Color;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Thickness;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Product::factory()->count(800)->state(new Sequence(
      fn ($sequence) => [
        'manufacturer_id' => Manufacturer::all()->random(),
        'color_id' => Color::all()->random(),
        'thickness_id' => Thickness::all()->random(),
        'category_id' => Category::all()->random()
      ]
    ))->create();
  }
}
