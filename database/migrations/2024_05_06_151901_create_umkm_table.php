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
            $table->unsignedBigInteger('id_warga')->nullable()->index('id_warga');
            $table->string('nama_umkm', 50)->nullable();
            $table->text('content')->nullable();
            $table->timestamps();

            $table->foreign('id_warga')
                ->references('id_warga')
                ->on('warga')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
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
