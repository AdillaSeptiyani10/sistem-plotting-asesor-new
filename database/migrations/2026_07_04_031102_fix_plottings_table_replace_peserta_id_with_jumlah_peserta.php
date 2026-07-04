<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('plottings', function (Blueprint $table) {
            // Hapus foreign key dan kolom peserta_id jika masih ada
            if (Schema::hasColumn('plottings', 'peserta_id')) {
                $table->dropForeign(['peserta_id']);
                $table->dropColumn('peserta_id');
            }

            // Tambah kolom jumlah_peserta jika belum ada
            if (!Schema::hasColumn('plottings', 'jumlah_peserta')) {
                $table->unsignedInteger('jumlah_peserta')->after('asesor_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('plottings', function (Blueprint $table) {
            if (Schema::hasColumn('plottings', 'jumlah_peserta')) {
                $table->dropColumn('jumlah_peserta');
            }

            if (!Schema::hasColumn('plottings', 'peserta_id')) {
                $table->foreignId('peserta_id')->after('asesor_id')->constrained()->onDelete('cascade');
            }
        });
    }
};
