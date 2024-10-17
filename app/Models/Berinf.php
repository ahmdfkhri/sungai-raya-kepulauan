<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berinf extends Model
{
    use HasFactory;

    protected $table = 'berinf';

    protected $fillable = [
        'thumbnail',
        'title',
        'category',
        'views',
        'highlight',
    ];

    public function contents()
    {
        return $this->hasMany(Content::class, 'berinf_id');
    }
}
