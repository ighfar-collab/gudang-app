<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->string('id_pinjaman', 10)->primary();
            $table->date('tanggal');
            $table->string('nama', 30);
            $table->string('alamat', 50);
            $table->string('notelp', 15);
            $table->string('ket', 100);
            $table->integer('nominal');
            $table->integer('sisa');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pinjaman');
    }
};
