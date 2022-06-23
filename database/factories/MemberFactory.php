<?php

// Factory namepacing.
namespace Database\Factories;

// Facades.
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'team_id'       => $this->faker->numberBetween(1,9),
            'membership_id' => $this->faker->numberBetween(1,3),
            'name'          => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'email'         => $this->faker->unique()->email(),
            'phone'         => $this->faker->phoneNumber(),
            'mobile'        => $this->faker->unique()->phoneNumber(),
            'street'        => $this->faker->streetName() . ' ' . $this->faker->numberBetween(1,150),
            'zip_code'      => $this->faker->postcode(),
            'location'      => $this->faker->city(),
            'country'       => 'NL',
            'birthday'      => $this->faker->date($format = 'Y-m-d', $max = '2015-01-01'),
        ];
    }
}
