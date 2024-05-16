<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rank_mabac', function (Blueprint $table) {
            $table->id('id_rankMabac');
            $table->foreignId('id_keluarga')->constrained('keluarga', 'id_keluarga')->cascadeOnDelete()->cascadeOnUpdate();
            $table->float('score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rank_mabacs');
    }
};
