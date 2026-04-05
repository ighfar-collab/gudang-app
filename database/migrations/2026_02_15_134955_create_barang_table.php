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
   Schema::create('barang', function (Blueprint $table) {
    $table->id();
    $table->string('kode')->unique();
     $table->bigInteger('kategori_id')->unsigned();
    $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
     $table->string('barcode')->unique()->nullable();
    $table->string('nama');
    $table->bigInteger('harga_beli');
    $table->bigInteger('harga_jual');
    $table->integer('stok')->default(0);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
