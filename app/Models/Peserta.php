<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = [
        'nama',
        'jurusan'
    ];

    public function plottings()
    {
        return $this->hasMany(Plotting::class);
    }
}