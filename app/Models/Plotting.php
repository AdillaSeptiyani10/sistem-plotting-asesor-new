<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plotting extends Model
{
    protected $fillable = [
        'asesor_id',
        'jumlah_peserta',
        'tuk_id',
        'skema_sertifikasi',
        'holding',
        'metode_kegiatan',
        'tanggal',
        'waktu_asesmen',
        'waktu_selesai',
        'approver_h4',
        'spt_h2',
        'status',
        'tgl_diajukan',
        'tgl_direspon',
        'asesor_pengganti',
        'progres',
        'kinerja_asesor',
        'tgl_pleno',
        'terbit_sertifikat',
        'catatan_asesmen',
    ];

    protected $casts = [
        'terbit_sertifikat' => 'boolean',
        'tgl_diajukan'      => 'date',
        'tgl_direspon'      => 'date',
        'tgl_pleno'         => 'date',
        'tanggal'           => 'date',
    ];

    public function asesor()
    {
        return $this->belongsTo(Asesor::class);
    }

    public function tuk()
    {
        return $this->belongsTo(Tuk::class);
    }
}
