<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plotting extends Model
{
    protected $fillable = [
        'asesor_id',
        'peserta_id',
        'tanggal',
        'lokasi'
    ];

    public function asesor()
    {
        return $this->belongsTo(Asesor::class);
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}