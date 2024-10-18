<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'views',
        'published_at',
    ];

    public function contents()
    {
        return $this->hasMany(ArticleContent::class, 'article_id');
    }

    public function firstContent()
    {
        return $this->hasOne(ArticleContent::class, 'article_id')->orderBy('order', 'asc');
    }

    public function scopeBerita(Builder $query) {
        return $query->where('type', 'berita');
    }

    public function scopeInformasi(Builder $query) {
        return $query->where('type', 'informasi');
    }
}