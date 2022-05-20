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
        Schema::create("transaksi", function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_customer")->constrained("customer");
            $table->foreignId("id_barang")->constrained("barang");
            $table->timestamps();
            $table->integer("total_harga");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("transaksis");
    }
};