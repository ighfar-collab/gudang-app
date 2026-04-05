<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pembelians', function (Blueprint $table) {

            $table->enum('metode_bayar',['cash','kredit'])
                  ->default('cash')
                  ->after('total');

            $table->integer('dibayar')
                  ->default(0)
                  ->after('metode_bayar');

            $table->integer('sisa')
                  ->default(0)
                  ->after('dibayar');

        });
    }

    public function down(): void
    {
        Schema::table('pembelians', function (Blueprint $table) {

            $table->dropColumn([
                'metode_bayar',
                'dibayar',
                'sisa'
            ]);

        });
    }
};