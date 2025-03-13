<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Brand::class;

   public function definition()
    {
        $brandName = $this->faker->randomElement(['Donalds', 'SailBNB', 'Pea', 'Macrosoft', 'AEKI', 'KAMP']);

        return [
            'brand_name' => $brandName,
            'brand_slug' => Str::slug($brandName),
            'brand_image' => $this->faker->imageUrl(200, 200),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
