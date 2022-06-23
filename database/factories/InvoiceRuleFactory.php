<?php

// Factory namepacing.
namespace Database\Factories;

// Facades.
use Illuminate\Database\Eloquent\Factories\Factory;

// Models
use App\Models\Invoice;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvoiceRule>
 */
class InvoiceRuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'invoice_id' => Invoice::select('id')->orderByRaw("RAND()")->first(),
            'description' => $this->faker->sentence(6),
            'price' => random_int(50, 150),
            'amount' => random_int(1, 10),
        ];
    }
}
