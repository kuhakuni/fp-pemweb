<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("barang", function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nama_barang", 100);
            $table->integer("harga");
            $table->integer("stok");
            $table->foreignId("id_kategori")->constrained("kategori");
            $table->foreignId("id_supplier")->constrained("supplier");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("barangs");
    }
};