<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleContent extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleContentFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'article_id',
        'type',
        'value',
        'order',
    ];
}
