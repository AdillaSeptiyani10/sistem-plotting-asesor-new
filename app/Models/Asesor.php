<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'bidang',
        'no_hp'
    ];
}