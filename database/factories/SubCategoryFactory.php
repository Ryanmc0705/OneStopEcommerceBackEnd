<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           "category_id" => Category::inRandomOrder()->first()->id,
           "sub_category" => $this->faker->sentence(rand(2,5))
        ];
    }
}
