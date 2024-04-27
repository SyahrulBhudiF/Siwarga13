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
        Schema::table('warga', function (Blueprint $table) {
            $table->foreign(['id_alamat'], 'warga_ibfk_1')->references(['id_alamat'])->on('alamat')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_status'], 'warga_ibfk_2')->references(['id_status'])->on('status')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warga', function (Blueprint $table) {
            $table->dropForeign('warga_ibfk_1');
            $table->dropForeign('warga_ibfk_2');
        });
    }
};
