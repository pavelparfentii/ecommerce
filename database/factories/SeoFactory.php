<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SeoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'meta_title' => 'Online supermarket',
            'meta_description' => 'All-In-One marketing, automation',
            'meta_keyword' => 'supermarket in Spring, Texas',
            'google_analytics' => $this->faker->sentence(),

        ];
    }
}
