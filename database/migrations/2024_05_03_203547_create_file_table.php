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
        Schema::create('file', function (Blueprint $table) {
            $table->integer('id_file', true);
            $table->string('path')->nullable();
            $table->enum('type', ['umkm', 'dokumentasi', 'pengumuman']);
            $table->integer('umkm_id')->nullable();
            $table->integer('dokumentasi_id')->nullable();
            $table->integer('pengumuman_id')->nullable();

            $table->foreign('umkm_id')->references('id_umkm')->on('umkm')->onDelete('cascade');
            $table->foreign('dokumentasi_id')->references('id_dokumentasi')->on('dokumentasi')->onDelete('cascade');
            $table->foreign('pengumuman_id')->references('id_pengumuman')->on('pengumuman')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file');
    }
};
