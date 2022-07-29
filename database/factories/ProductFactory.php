<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'image' => rand(1, 3) . ".jpg",
            'unit_price' => rand(1,999)."000000",
            'promotion_price' => rand(1,999)."000000",
            'unit' => $this->faker->name(),
            'id_type' => rand(1, 7),
            'description'=> $this->faker->name()
        ];
    }
}
