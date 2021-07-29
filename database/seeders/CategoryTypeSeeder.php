<?php

namespace Database\Seeders;

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
		$furniture_type = [
			'name' => 'Мебельные материалы'
		];

		$build_type = [
			'name' => 'Строительные материалы'
		];

		DB::table('category_types')->insert([
			$furniture_type,
			$build_type
		]);
	}
}
