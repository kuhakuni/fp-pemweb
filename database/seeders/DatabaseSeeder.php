<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
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
        ];
        \App\Models\Customer::factory()
            ->count(20)
            ->create();
        \App\Models\Supplier::factory()
            ->count(20)
            ->create();
        foreach ($kategori as $k) {
            Kategori::create(["kategori" => $k]);
        }
        \App\Models\Barang::factory()
            ->count(20)
            ->create();
        \App\Models\Transaksi::factory()
            ->count(20)
            ->create();
        \App\Models\Administrator::factory()
            ->count(1)
            ->create();
        \App\Models\DetailTransaksi::factory()
            ->count(20)
            ->create();
    }
}