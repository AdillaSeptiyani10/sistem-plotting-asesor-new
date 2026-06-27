<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tuk extends Model
{
    protected $fillable = [
        'nama_tuk',
        'alamat',
        'penanggung_jawab',
        'no_hp'
    ];
}