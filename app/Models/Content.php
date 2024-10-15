<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'content';

    protected $fillable = [
        'values',
        'type',
        'order',
    ];

    // Relasi dengan tabel berinf (One-to-Many)
    public function berinf()
    {
        return $this->hasMany(Berinf::class, 'content_id');
    }
};
