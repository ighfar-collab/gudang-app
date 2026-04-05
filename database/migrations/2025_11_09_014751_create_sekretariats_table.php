<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sekretariats', function (Blueprint $table) {
            $table->id();
            $table->year('year')->nullable();
            $table->string('month')->nullable();
            $table->decimal('nilai_sakip', 5, 2)->nullable(); // contoh: 85.50
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sekretariats');
    }
};

