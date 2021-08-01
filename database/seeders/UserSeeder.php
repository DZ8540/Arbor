<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $admin = [
      'is_admin' => 1,
			'name' => 'admin',
      'email' => 'admin@mail.ru',
      'password' => Hash::make('12345678')
		];

		$test = [
			'is_admin' => 0,
			'name' => 'test',
      'email' => 'test@mail.ru',
      'password' => Hash::make('12345678')
		];

		DB::table('users')->insert([
			$admin,
			$test
		]);
  }
}