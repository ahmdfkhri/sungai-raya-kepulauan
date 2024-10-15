<?php

namespace App\View\Components;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArticleCard extends Component
{
    public $imageUrl;
    public $date;
    public $tag;
    public $title;
    public $url;
    public $description;
    public $views;

    /**
     * Create a new component instance.
     */
    public function __construct($imageUrl, $date, $tag, $title, $url, $description, $views)
    {
        $this->imageUrl = $imageUrl;
        $this->date = Carbon::parse($date)->translatedFormat("l, d F Y");
        $this->tag = $tag;
        $this->title = $title;
        $this->url = $url;
        $this->description = $description;
        $this->views = number_format($views);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article-card');
    }
}
