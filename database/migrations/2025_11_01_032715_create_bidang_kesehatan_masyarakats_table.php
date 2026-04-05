<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bidang_kesehatan_masyarakats', function (Blueprint $table) {
            $table->id();
            $table->year('year')->nullable();
               $table->string('month')->nullable();  // tahun data (opsional)
            $table->string('lokasi')->nullable(); // lokasi/daerah (opsional)
            $table->decimal('angka_kematian_ibu_per_100000', 8, 2)->nullable(); // per 100k
            $table->decimal('angka_kematian_bayi_per_1000', 8, 2)->nullable(); // per 1000
            $table->decimal('prevalensi_stunting', 5, 2)->nullable(); // persen, 0.00 - 100.00
            $table->decimal('cakupan_asi_eksklusif', 5, 2)->nullable(); // persen
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bidang_kesehatan_masyarakats');
    }
};
