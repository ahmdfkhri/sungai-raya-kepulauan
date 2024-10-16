<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VM extends Model
{
    use HasFactory;

    protected $table = 'v&m';

    protected $fillable = ['tipe', 'desc'];

    // public $timestamps = false;
}
