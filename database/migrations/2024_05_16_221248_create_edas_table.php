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
        Schema::create('edas', function (Blueprint $table) {
            $table->id('id_edas');
            $table->json('decision_matrix');
            $table->json('average');
            $table->json('pda');
            $table->json('nda');
            $table->json('sp');
            $table->json('sn');
            $table->json('nsn');
            $table->json('nsp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edas');
    }
};
