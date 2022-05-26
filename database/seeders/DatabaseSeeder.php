<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      UserSeeder::class,
      // CategoryTypeSeeder::class,
      AboutCompanySeeder::class,
      BannerSeeder::class,
      // ColorSeeder::class,
      // ManufacturerSeeder::class,
      NewsSeeder::class,
      // ThicknessSeeder::class,
      // ProductSeeder::class
    ]);
  }
}