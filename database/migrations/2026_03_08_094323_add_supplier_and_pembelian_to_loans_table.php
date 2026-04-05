<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('loans', function (Blueprint $table) {

            $table->foreignId('supplier_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('pembelian_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('loans', function (Blueprint $table) {

            $table->dropForeign(['supplier_id']);
            $table->dropForeign(['pembelian_id']);

            $table->dropColumn('supplier_id');
            $table->dropColumn('pembelian_id');

        });
    }
};