<?php

namespace Database\Factories;

use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipStateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model= ShipState::class;
    public function definition()
    {
        $stateNames = $this->faker->randomElement(['Wubleobar', 'Cathuenga', 'Tagristan', 'Costea', 'Dreastan']);
        return [
            'state_name'=>$stateNames,
            'division_id'=>ShipDivision::inRandomOrder()->first()->id ?? ShipDivision::factory(),
            'district_id'=>ShipDistrict::inRandomOrder()->first()->id ?? ShipDistrict::factory(),
        ];
    }
}
