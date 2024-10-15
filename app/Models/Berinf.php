<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berinf extends Model
{
    use HasFactory;

    protected $table = 'berinf';

    protected $fillable = [
        'foto',
        'judul',
        'hight',
        'content_id',
    ];

    // Relasi dengan tabel content (Many-to-One)
    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id');
    }
};
