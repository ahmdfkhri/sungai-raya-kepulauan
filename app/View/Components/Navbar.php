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
                'urls' => [route('visi-misi'), route('struktur-organisasi'), route('dokumen-publik') ],
                'items' => [
                    ['name' => 'Visi dan Misi', 'url' => route('visi-misi')],
                    ['name' => 'Struktur Organisasi', 'url' => route('struktur-organisasi')],
                    ['name' => 'Dokumen Publik', 'url' => route('dokumen-publik')],
                ],
            ],
            [
                'name' => 'Berita dan Informasi',
                'type' => 'link',
                'url' => route('berita-informasi'),
            ],

        ];

        // Get current route
        $this->currentRoute = request()->url();        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
