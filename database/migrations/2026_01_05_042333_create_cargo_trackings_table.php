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
        Schema::create('cargo_trackings', function (Blueprint $table) {
       $table->id();

            $table->foreignId('cargo_id')
                  ->constrained('cargos')
                  ->onDelete('cascade');

            $table->string('lokasi');
            $table->string('status'); // pending, proses, transit, sampai, diterima
            $table->text('keterangan')->nullable();

            // Koordinat untuk map
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargo_trackings');
    }
};
