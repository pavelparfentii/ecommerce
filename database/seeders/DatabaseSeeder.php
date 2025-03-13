<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Seo;
use App\Models\ShipDivision;
use App\Models\ShipState;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Electronics', 'Fashion', 'Books',
            'Home Appliances', 'Toys', 'Tools',
            'Jewelry', 'Watches', 'Accessories',
            'Health', 'Beauty', 'Health & Beauty',
        ];

         \App\Models\Admin::factory()->create();

        Brand::factory(5)->create();
//        Category::factory(5)->create();
        foreach ($categories as $categoryName) {
            Category::factory()->create([
                'category_name' => $categoryName,
                'category_slug' => Str::slug($categoryName),
            ]);
        }
        SubCategory::factory(5)->create();
        SubSubCategory::factory(10)->create();
        Product::factory(10)->create();
        Slider::factory(3)->create();
        Seo::factory(1)->create();
        ShipDivision::factory(5)->create();
        ShipDivision::factory(5)->create();
        ShipState::factory(5)->create();

    }
}
