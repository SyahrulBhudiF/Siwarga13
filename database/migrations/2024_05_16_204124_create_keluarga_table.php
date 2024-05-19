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
        Schema::create('keluarga', function (Blueprint $table) {
            $table->id('id_keluarga');
            $table->unsignedBigInteger('id_warga')->index()->nullable();
            $table->string('noKK', 16)->nullable();
            $table->integer('jumlah_pekerja')->nullable();
            $table->decimal('total_pendapatan', 15)->nullable();
            $table->integer('tanggungan')->nullable();
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
        Schema::dropIfExists('keluarga');
    }
};
