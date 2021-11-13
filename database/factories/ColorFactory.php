<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $color = $this->faker->unique()->safeColorName();

    return [
      'slug' => Str::random(7),
      'name' => $color,
      'hex_code' => $color
    ];
  }
}
