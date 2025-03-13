<?php

namespace Database\Factories;

use App\Models\SiteSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = SiteSetting::class;

    public function definition()
    {
        return [
            'logo' => $this->faker->imageUrl(),
            'phone_one' => $this->faker->phoneNumber(),
            'phone_two' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'company_name'=>$this->faker->company(),
            'company_address'=>$this->faker->address(),
            'facebook'=>'#',
            'twitter'=>'#',
            'linkedin'=>'#',
            'youtube'=>'#',

        ];
    }
}
