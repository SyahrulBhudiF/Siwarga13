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
        Schema::create('mabac', function (Blueprint $table) {
            $table->id('id_mabac');
            $table->json('decision_matrix');
            $table->json('min');
            $table->json('max');
            $table->json('normalizedX');
            $table->json('weightV');
            $table->json('limitsG');
            $table->json('distanceQ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mabac');
    }
};
