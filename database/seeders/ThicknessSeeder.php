<?php

namespace Database\Seeders;

use App\Models\Thickness;
use Illuminate\Database\Seeder;

class ThicknessSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Thickness::factory()->count(5)->create();
  }
}
