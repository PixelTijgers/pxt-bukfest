<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'boardfunction' => \Arr::random(['Voorzitter', 'Bestuurslid', 'Secretaris', 'Penningmeester', 'Jeugdzaken']),
        ];
    }
}
