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
        Schema::create('sumber', function (Blueprint $table) {
                    $table->string('id_sumber', 11)->primary();
            $table->date('tanggal');
            $table->string('nama', 20);
            $table->timestamps();
        });

        // set engine MyISAM
        DB::statement('ALTER TABLE sumber ENGINE = MyISAM');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumber');
    }
};
