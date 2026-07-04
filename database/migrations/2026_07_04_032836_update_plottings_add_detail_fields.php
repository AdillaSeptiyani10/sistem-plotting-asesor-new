<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('plottings', function (Blueprint $table) {
            // nama_lsp diganti jadi holding (nama LSP)
            // sudah ada: asesor_id, jumlah_peserta, tuk_id, skema_sertifikasi, nama_lsp, metode_kegiatan, tanggal

            $table->string('waktu_asesmen')->nullable()->after('tanggal');
            $table->string('approver_email')->nullable()->after('waktu_asesmen');
            $table->enum('status', ['Pending', 'Disetujui', 'Ditolak'])->default('Pending')->after('approver_email');
            $table->date('tgl_diajukan')->nullable()->after('status');
            $table->date('tgl_direspon')->nullable()->after('tgl_diajukan');
            $table->string('asesor_pengganti')->nullable()->after('tgl_direspon');
            $table->string('spt_file')->nullable()->after('asesor_pengganti'); // upload file SPT H-2
            $table->enum('progres', ['Belum', 'Proses', 'Selesai'])->default('Belum')->after('spt_file');
            $table->string('kinerja_asesor')->nullable()->after('progres');
            $table->date('tgl_pleno')->nullable()->after('kinerja_asesor');
            $table->boolean('terbit_sertifikat')->default(false)->after('tgl_pleno');
            $table->text('catatan_asesmen')->nullable()->after('terbit_sertifikat');
        });
    }

    public function down(): void
    {
        Schema::table('plottings', function (Blueprint $table) {
            $table->dropColumn([
                'waktu_asesmen', 'approver_email', 'status', 'tgl_diajukan',
                'tgl_direspon', 'asesor_pengganti', 'spt_file', 'progres',
                'kinerja_asesor', 'tgl_pleno', 'terbit_sertifikat', 'catatan_asesmen',
            ]);
        });
    }
};
