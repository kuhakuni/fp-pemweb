<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nama_barang" => $this->faker->unique()->word(2),
            "harga" => $this->faker->randomNumber(5, true),
            "stok" => $this->faker->randomNumber(2, true),
            "id_kategori" => $this->faker->numberBetween(1, 10),
            "id_supplier" => $this->faker->numberBetween(1, 20),
        ];
    }
}