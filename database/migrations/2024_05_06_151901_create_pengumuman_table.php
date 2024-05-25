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
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id('id_pengumuman');
            $table->string('judul', 100)->nullable();
            $table->string('tanggal', 20)->nullable();
            $table->string('nomor', 50)->nullable();
            $table->string('perihal', 50)->nullable();
            $table->string('kepada', 50)->nullable();
            $table->string('penerbit', 10)->nullable();
            $table->string('path_thumbnail')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
