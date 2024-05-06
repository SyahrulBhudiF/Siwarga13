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
        Schema::create('file', function (Blueprint $table) {
            $table->integer('id_file', true);
            $table->string('path')->nullable();
            $table->enum('type', ['umkm', 'dokumentasi', 'pengumuman']);
            $table->integer('umkm_id')->nullable()->index('file_umkm_id_foreign');
            $table->integer('dokumentasi_id')->nullable()->index('file_dokumentasi_id_foreign');
            $table->integer('pengumuman_id')->nullable()->index('file_pengumuman_id_foreign');
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
