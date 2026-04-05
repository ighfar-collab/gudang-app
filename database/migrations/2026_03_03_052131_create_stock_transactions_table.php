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
        Schema::create('stock_transactions', function (Blueprint $table) {
    $table->id();
    $table->foreignId('item_id')->constrained()->cascadeOnDelete();
    $table->enum('jenis', ['masuk','keluar','penjualan','retur']);
    $table->integer('qty');
    $table->unsignedBigInteger('ref_id')->nullable();
    $table->text('keterangan')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_transactions');
    }
};
