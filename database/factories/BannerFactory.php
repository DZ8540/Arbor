<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class BannerFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'title' => $this->faker->words(3, true),
      'description' => $this->faker->sentence(),
      'link' => '#'
    ];
  }
}
