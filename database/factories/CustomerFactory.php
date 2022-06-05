<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nama_customer" => $this->faker->unique()->name(),
            "alamat" => $this->faker->address(),
            "no_telp" => $this->faker->phoneNumber(),
            //
        ];
    }
}