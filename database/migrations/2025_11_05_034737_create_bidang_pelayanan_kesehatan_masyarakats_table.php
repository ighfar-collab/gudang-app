<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bidang_pelayanan_kesehatan_masyarakats', function (Blueprint $table) {
            $table->id();
            $table->year('year')->nullable(); 
                  $table->year('month')->nullable(); // tahun data (opsional)
            $table->string('lokasi')->nullable(); // kabupaten/kota (opsional)
            $table->decimal('persentase_fasyankes_terakreditasi', 5, 2)->nullable(); // persen
            $table->integer('jumlah_rs_terakreditasi')->nullable(); // jumlah rumah sakit
            $table->integer('jumlah_puskesmas_terakreditasi_madya')->nullable(); // jumlah puskesmas madya
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bidang_pelayanan_kesehatan_masyarakats');
    }
};
