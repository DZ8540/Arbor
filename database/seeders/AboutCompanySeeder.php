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
		$description = 'Значимость этих проблем настолько очевидна, что высокотехнологичная концепция общественного уклада не даёт
		нам иного выбора, кроме определения поставленных обществом задач. В частности,
		высокотехнологичная концепция общественного уклада позволяет оценить значение новых предложений.';

    $company = [
      'name' => config('app.name', 'Arbor'),
			'description' => $description,
			'work_start' => '07:00',
			'work_end' => '22:00',
			'email' => 'company@mail.ru',
			'phone' => '+7(917)234-56-78'
		];

		DB::table('about_company')->insert([
			$company
		]);
  }
}