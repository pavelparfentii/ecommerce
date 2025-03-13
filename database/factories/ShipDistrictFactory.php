<?php

namespace Database\Factories;

use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipDistrictFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = ShipDistrict::class;
    public function definition()
    {
        $districtName = $this->faker->randomElement(['Lower North shropet', 'Lower South shropet', 'Fort Neatag', 'Sluppexest Garden', 'Twaffuven Market']);

        return [
            'division_id'=>ShipDivision::inRandomOrder()->first()->id ?? ShipDivision::factory(),
            'district_name'=>$districtName[rand(0, 2)],
        ];
    }
}
