<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Banner::factory()->count(4)->create();

    $additional = [
      'title' => 'Широкий выбор ЛДСП',
      'description' => 'Как принято считать, базовые сценарии поведения пользователей набирают популярность среди определенных слоев населения, а значит, должны быть разоблачены.',
      'link' => '#',
      'is_additional' => 1
    ];

    DB::table('banners')->insert([
			$additional
		]);
  }
}
