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
        Schema::create("supplier", function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nama_supplier", 100);
            $table->string("alamat", 200);
            $table->string("no_telp", 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("supplier");
    }
};