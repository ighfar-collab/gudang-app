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
        Schema::create('vehicles', function (Blueprint $table) {
                $table->id();
            $table->string('nomor_polisi')->unique();
            $table->string('jenis');           // Truck, Pickup, Box, dll
            $table->string('merk')->nullable();
            $table->string('warna')->nullable();
            $table->integer('kapasitas_kg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
