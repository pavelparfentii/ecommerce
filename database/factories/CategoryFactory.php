<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Category::class;

    public function definition()
    {
        $categoryName = $this->faker->randomElement(['Electronics', 'Fashion', 'Books', 'Home Appliances', 'Toys']);

        return [
            'category_name' => $categoryName,

            'category_slug' => Str::slug($categoryName),
            'category_icon' => $this->faker->imageUrl(100, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
