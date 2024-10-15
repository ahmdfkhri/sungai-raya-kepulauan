<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai'; // Pastikan ini sudah benar

    protected $fillable = [
        'nama_pegawai',
        'jabatan',
        'foto',
        'level',
    ];
};


