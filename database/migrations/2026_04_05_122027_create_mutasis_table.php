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
      Schema::create('mutasis', function (Blueprint $table) {
    $table->id();
    $table->foreignId('barang_id')->constrained();
    $table->foreignId('dari_gudang')->nullable()->constrained('gudangs');
    $table->foreignId('ke_gudang')->nullable()->constrained('gudangs');
    $table->integer('jumlah');
    $table->enum('tipe', ['masuk', 'keluar', 'transfer']);
    $table->timestamp('tanggal');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasis');
    }
};
