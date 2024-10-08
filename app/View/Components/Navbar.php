<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */

    public $navItems;
    public $currentRoute;
    public $test;
    
    public function __construct()
    {
        // Link Schema
        $this->navItems = [
            [
                'name' => 'Homepage',
                'type' => 'link',
                'url' => route('home'),
            ],
            [
                'name' => 'Administrasi',
                'type' => 'dropdown',
                'items' => [
                    ['name' => 'Visi dan Misi', 'url' => '#'],
                    ['name' => 'Struktur Organisasi', 'url' => '#'],
                    ['name' => 'Dokumen Publik', 'url' => '#'],
                ],
            ],
            [
                'name' => 'Berita dan Informasi',
                'type' => 'link',
                'url' => '#',
            ],

        ];

        // Get current route
        $this->currentRoute = request()->url();

        $this->test = array_map(function ($item) {
            return $item['url'];
        }, $this->navItems[1]['items']);
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
