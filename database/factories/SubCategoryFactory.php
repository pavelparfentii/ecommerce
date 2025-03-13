<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = SubCategory::class;

    public function definition()
    {

        $subCategoryName = $this->faker->randomElement([
            'Smartphones', 'Laptops', 'Men Clothing', 'Women Clothing', 'Fiction Books', 'Science Books', 'Kitchenware', 'Toys for Kids'
        ]);

        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'subcategory_name' => $subCategoryName,
            'subcategory_slug' => Str::slug($subCategoryName),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
