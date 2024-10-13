<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewsContainer extends Component
{
    public $news;
    public $containerTitle;
    public $containerDescription;
    public $containerUrl;

    /**
     * Create a new component instance.
     */
    public function __construct($containerTitle, $containerDescription, $containerUrl)
    {
        $this->containerTitle = $containerTitle;
        $this->containerDescription = $containerDescription;
        $this->containerUrl = $containerUrl;
        
        $this->news = [
            [
                'title' => 'Lorem',
                'url' => route('home'),
                'imageUrl' => 'https://images.unsplash.com/photo-1727731481816-bf055858e20f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Ipsum',
                'url' => route('berita-informasi'),
                'imageUrl' => 'https://images.unsplash.com/photo-1727731481816-bf055858e20f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Berita Penting',
                'url' => route('berita-informasi'),
                'imageUrl' => 'https://images.unsplash.com/photo-1727887746394-8b5c23c98b40?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Berita Penting',
                'url' => route('berita-informasi'),
                'imageUrl' => 'https://images.unsplash.com/photo-1727887746394-8b5c23c98b40?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Berita Penting',
                'url' => route('berita-informasi'),
                'imageUrl' => 'https://images.unsplash.com/photo-1728292411378-cdb1bdd02591?q=80&w=2000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.news-container');
    }
}
