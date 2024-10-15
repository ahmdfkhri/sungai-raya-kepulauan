<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Highlight extends Component
{
    public $items;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->items = [
            [
                'title' => 'Highlight 1',
                'imageUrl' => 'https://images.unsplash.com/photo-1728931710220-45fa008628a9?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHwzfHx8ZW58MHx8fHx8',
                'url' => '#',
            ],
            [
                'title' => 'Highlight 2',
                'imageUrl' => 'https://images.unsplash.com/photo-1727257186617-38153f3bc067?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'url' => '#',
            ],
            [
                'title' => 'Highlight 3',
                'imageUrl' => 'https://images.unsplash.com/photo-1695381733504-3dccb00b6d92?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDV8fHxlbnwwfHx8fHw%3D',
                'url' => '#',
            ],
            [
                'title' => 'Highlight 4',
                'imageUrl' => 'https://plus.unsplash.com/premium_photo-1728877784208-d1c83967c5b5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDh8fHxlbnwwfHx8fHw%3D',
                'url' => '#',
            ],
            [
                'title' => 'Highlight 5',
                'imageUrl' => 'https://images.unsplash.com/photo-1722099853080-e12fc2dbdfaf?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDEzfHx8ZW58MHx8fHx8',
                'url' => '#',
            ],
            [
                'title' => 'Highlight 6',
                'imageUrl' => 'https://plus.unsplash.com/premium_photo-1728877784208-d1c83967c5b5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDh8fHxlbnwwfHx8fHw%3D',
                'url' => '#',
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.highlight');
    }
}
