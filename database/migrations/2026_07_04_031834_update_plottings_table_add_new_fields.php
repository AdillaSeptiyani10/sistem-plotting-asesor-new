<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('plottings', function (Blueprint $table) {
            // Hapus kolom lokasi lama
            if (Schema::hasColumn('plottings', 'lokasi')) {
                $table->dropColumn('lokasi');
            }

            // Tambah kolom baru
            $table->foreignId('tuk_id')->nullable()->after('jumlah_peserta')->constrained()->onDelete('set null');
            $table->string('skema_sertifikasi')->after('tuk_id');
            $table->string('nama_lsp')->after('skema_sertifikasi');
            $table->string('metode_kegiatan')->after('nama_lsp');
        });
    }

    public function down(): void
    {
        Schema::table('plottings', function (Blueprint $table) {
            $table->dropForeign(['tuk_id']);
            $table->dropColumn(['tuk_id', 'skema_sertifikasi', 'nama_lsp', 'metode_kegiatan']);
            $table->string('lokasi')->after('tanggal');
        });
    }
};
