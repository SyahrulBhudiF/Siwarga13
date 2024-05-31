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
        Schema::create('umkm', function (Blueprint $table) {
            $table->id('id_umkm');
            $table->string('judul', 50)->nullable();
            $table->string('alamat', 50)->nullable();
            $table->enum('kategori', ['Kuliner', 'Fashion', 'Kecantikan', 'Agribisnis', 'Otomotif'])->nullable();
            $table->string('harga', 100)->nullable();
            $table->string('no_telp', 50)->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
