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
        Schema::table('file', function (Blueprint $table) {
            $table->foreign(['dokumentasi_id'])->references(['id_dokumentasi'])->on('dokumentasi')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['pengumuman_id'])->references(['id_pengumuman'])->on('pengumuman')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['umkm_id'])->references(['id_umkm'])->on('umkm')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('file', function (Blueprint $table) {
            $table->dropForeign('file_dokumentasi_id_foreign');
            $table->dropForeign('file_pengumuman_id_foreign');
            $table->dropForeign('file_umkm_id_foreign');
        });
    }
};
