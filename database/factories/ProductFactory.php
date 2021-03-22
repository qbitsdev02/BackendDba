<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'description' => $this->faker->title(),
            'code' => $this->faker->randomNumber(5, true),
            'category_id' => $this->faker->numberBetween(1, 9),
            'brand_id' => $this->faker->numberBetween(1, 5),
            'user_created_id' => 1
        ];
    }
}
