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
        'berinf_id',
    ];

    public function berinf()
    {
        return $this->belongsTo(Berinf::class, 'berinf_id');
    }
}
