<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "id_customer" => $this->faker->numberBetween(1, 20),
            "status_transaksi" => $this->faker->randomElement([
                "approved",
                "rejected",
                "pending",
            ]),
        ];
    }
}