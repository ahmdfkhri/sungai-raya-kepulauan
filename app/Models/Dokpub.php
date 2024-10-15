<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokpub extends Model
{
    use HasFactory;

    protected $table = 'dokpub'; // Nama tabel

    protected $fillable = [
        'judul',
        'tahun',
    ];
};
