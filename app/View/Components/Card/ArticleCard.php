<?php

namespace App\View\Components\Card;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArticleCard extends Component
{
    public $thumbnailUrl;
    public $title;
    public $publishDate;
    public $tag;
    public $description;
    public $articleUrl;
    public $views;

    /**
     * Create a new component instance.
     */
    public function __construct($thumbnailUrl, $title, $publishDate, $tag, $description, $articleUrl, $views)
    {
        $this->thumbnailUrl = $thumbnailUrl;
        $this->title = $title;
        $this->publishDate = Carbon::parse($publishDate)->translatedFormat("l, j F Y");
        $this->tag = $tag;
        $this->description = $description;
        $this->articleUrl = $articleUrl;
        $this->views = number_format($views);

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.article-card');
    }
}
