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
        Schema::create("detail_transaksi", function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_transaksi")->constrained("transaksi");
            $table->foreignId("id_barang")->constrained("barang");
            $table->integer("jumlah_barang");
            $table->unique(["id_transaksi", "id_barang"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("detail_transaksi");
    }
};