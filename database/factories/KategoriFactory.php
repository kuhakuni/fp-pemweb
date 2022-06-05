<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "kategori" => $this->faker->randomElements(
                [
                    "Rumah Tangga",
                    "Komputer",
                    "Handphone",
                    "Elektronik",
                    "Fashion",
                    "Otomotif",
                    "Kesehatan",
                    "Olahraga",
                    "Kerajinan",
                    "Lainnya",
                ],
                10
            ),
            //
        ];
    }
}