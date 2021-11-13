<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'slug' => Str::random(8),
      'name' => $this->faker->word(),
      'description' => $this->faker->text()
    ];
  }
}
