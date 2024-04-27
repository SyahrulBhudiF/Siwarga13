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
        Schema::table('umkm', function (Blueprint $table) {
            $table->foreign(['id_warga'], 'umkm_ibfk_1')->references(['id_warga'])->on('warga')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_file'], 'umkm_ibfk_2')->references(['id_file'])->on('file')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('umkm', function (Blueprint $table) {
            $table->dropForeign('umkm_ibfk_1');
            $table->dropForeign('umkm_ibfk_2');
        });
    }
};
