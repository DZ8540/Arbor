<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTypeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
    CategoryType::factory()->state([ 'name' => 'Мебельные материалы' ])->has(
      Category::factory()->count(20)->state(
        function (array $attributes, CategoryType $category_type) {
          return ['category_type_id' => $category_type->id];
        }
      )
    )->create();

    CategoryType::factory()->state([ 'name' => 'Строительные материалы' ])->has(
      Category::factory()->count(26)->state(
        function (array $attributes, CategoryType $category_type) {
          return ['category_type_id' => $category_type->id];
        }
      )
    )->create();
	}
}
