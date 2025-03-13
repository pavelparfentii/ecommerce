<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Product::class;

    public function definition()
    {

        $productName = $this->faker->randomElement([
            'iPhone 6', 'Samsung Galaxy S3', 'McBook Pro',
            'Running Shoes', 'Leather Jacket', 'Mystery Novel',
            'Kitchen Blender', 'LEGO Set', 'T-Shirt',  'Belt',
            'Laptops', 'Gadgets', 'Sony Samsung',
            'Accessories', 'Bowl', 'Plate', 'Furniture', 'Package',
            'Combo', 'Women', 'Men', 'Jewelry', 'Electronic',
            'Other', 'Cats', 'Table', 'Chair', 'Sofa', 'Pencil', 'Pen',
            'Apple', 'Fruit', 'Comix Book'
        ]);

        return [
            'brand_id' => Brand::inRandomOrder()->first()->id ?? Brand::factory(),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'subcategory_id' => SubCategory::inRandomOrder()->first()->id ?? SubCategory::factory(),
            'subsubcategory_id' => SubSubCategory::inRandomOrder()->first()->id ?? SubSubCategory::factory(),
            'product_name' => $productName,
            'product_slug' => Str::slug($productName),
            'product_code' => $this->faker->uuid,
            'product_qty' => $this->faker->numberBetween(1, 100),
            'selling_price' => $this->faker->randomFloat(2, 10, 1000),
            'discount_price' => $this->faker->randomFloat(2, 5, 500),
            'short_desc' => $this->faker->sentence,
            'long_desc' => $this->faker->paragraph,
            'product_thumbnail' => $this->faker->imageUrl(250, 250),
            'hot_deals' => $this->faker->boolean,
            'featured' => $this->faker->boolean,
            'special_offer' => $this->faker->boolean,
            'special_deals' => $this->faker->boolean,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
