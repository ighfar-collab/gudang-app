<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bidang_pencegahan_penyakit_menulars', function (Blueprint $table) {
            $table->id();
    $table->year('year')->nullable(); 
                  $table->string('month')->nullable(); 
            $table->decimal('persentase_pelayanan_klb', 5, 2)->nullable();
            $table->integer('temuan_kasus_tb')->nullable();
            $table->decimal('persentase_imunisasi_dasar', 5, 2)->nullable();
            $table->decimal('pengendalian_merokok_usia_10_18', 5, 2)->nullable();
            $table->decimal('persentase_penanganan_krisis', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bidang_pencegahan_penyakit_menulars');
    }
};

