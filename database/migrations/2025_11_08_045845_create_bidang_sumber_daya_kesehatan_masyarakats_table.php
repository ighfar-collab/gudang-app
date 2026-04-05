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
        Schema::create('bidang_sumber_daya_kesehatan_masyarakats', function (Blueprint $table) {
            $table->id();
             $table->year('year')->nullable();
    $table->string('month')->nullable(); // Tambah kolom bulan
    $table->string('lokasi')->nullable();
    $table->decimal('indeks_rasio_dokter_dengan_penduduk', 8, 4)->nullable();
    $table->decimal('indeks_rasio_dokter_spesialis_dengan_penduduk', 8, 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidang_sumber_daya_kesehatan_masyarakats');
    }
};
