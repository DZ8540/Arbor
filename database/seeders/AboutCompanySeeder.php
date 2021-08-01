<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutCompanySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $company = [
      'name' => config('app.name', 'Arbor')
		];

		DB::table('about_company')->insert([
			$company
		]);
  }
}