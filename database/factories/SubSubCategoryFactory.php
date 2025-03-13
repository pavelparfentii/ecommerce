<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubSubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = SubSubCategory::class;

    public function definition()
    {
        $subsubcategoryName = $this->faker->randomElement([
            'Gaming Laptops', 'Premium Smartphones', 'Wireless Headphones',
            'Smartwatches', 'Gaming Keyboards', 'Mechanical Keyboards',
            'Cooling Systems', '4K Monitors', 'External Hard Drives',
            'Network Routers'
        ]);
        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'subcategory_id' => SubCategory::inRandomOrder()->first()->id ?? SubCategory::factory(),
            'subsubcategory_name' => $subsubcategoryName,
            'subsubcategory_slug' => Str::slug($subsubcategoryName),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
