<?php

// Factory namepacing.
namespace Database\Factories;

// Facades.
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id' => random_int(1, 25),
            'id_invoice' => '2021' . random_int(1000, 9999),
            'invoice_date' => $this->faker->dateTimeBetween('-3 weeks', '+2 days'),
            'is_payed' => \Arr::random([0,1]),
            'vat' => \Arr::random([0, 9, 21]),
        ];
    }
}
