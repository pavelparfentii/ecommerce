<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Slider::class;

    public function definition()
    {
        return [
            'slider_img' => $this->faker->imageUrl(800, 400),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
