<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailTransaksi>
 */
class DetailTransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "id_transaksi" => $this->faker->numberBetween(1, 20),
            "id_barang" => $this->faker->numberBetween(1, 20),
            "jumlah_barang" => $this->faker->randomNumber(3),
            //
        ];
    }
}