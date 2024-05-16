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
        Schema::create('warga', function (Blueprint $table) {
            $table->id('id_warga');
            $table->unsignedBigInteger('id_alamat')->nullable()->index('id_alamat');
            $table->unsignedBigInteger('id_status')->nullable()->index('id_status');
            $table->string('noKK', 16)->nullable();
            $table->string('nik', 16)->nullable()->unique('nik');
            $table->string('nama', 100)->nullable();
            $table->string('ttl', 150)->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'])->nullable();
            $table->decimal('pendapatan', 15)->nullable();
            $table->timestamps();

            $table->foreign('id_alamat')
                ->references('id_alamat')
                ->on('alamat')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('id_status')
                ->references('id_status')
                ->on('status')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
