<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
      'description' => $this->faker->text(),
      'code' => $this->faker->unique()->randomNumber(8, true),
      'price' => $this->faker->randomNumber(5),
      'format' => $this->faker->word(),
      'article' => $this->faker->word(),
      'count' => $this->faker->randomNumber(3)
    ];
  }
}
