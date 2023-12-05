<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id('id_car');
            $table->string('nama');
            $table->string('merk');
            $table->string('max_power');
            $table->float('fuel');
            $table->string('transmisi');
            $table->string('max_speed');
            $table->integer('kursi');
            $table->boolean('gps');
            $table->boolean('bluetooth');
            $table->float('harga');
            $table->longText('image_car');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
