<?php

namespace Database\Factories;

use App\Models\ShipDivision;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipDivisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model= ShipDivision::class;
    public function definition()
    {
        $divisionName = $this->faker->randomElement([
            'cos Road', 'Spus Circle', 'Hoostrilt East', 'Lower West neolzuc', 'West prooweac'
        ]);

        return [
            'division_name' => $divisionName,
        ];
    }
}
