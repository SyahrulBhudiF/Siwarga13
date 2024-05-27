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
            $table->id('id_file');
            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->string('publicId')->nullable();
            $table->enum('type', ['umkm', 'dokumentasi', 'pengumuman']);
            $table->unsignedBigInteger('id_umkm')->nullable()->index();
            $table->unsignedBigInteger('id_dokumentasi')->nullable()->index();
            $table->unsignedBigInteger('id_pengumuman')->nullable()->index();
            $table->timestamps();

            $table->foreign('id_umkm')
                ->references('id_umkm')
                ->on('umkm')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_dokumentasi')
                ->references('id_dokumentasi')
                ->on('dokumentasi')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_pengumuman')
                ->references('id_pengumuman')
                ->on('pengumuman')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
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
