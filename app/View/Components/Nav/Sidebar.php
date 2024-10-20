<?php

namespace App\View\Components\Nav;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $navItems;
    public $currentRoute;
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->navItems = [
            [
                'name' => 'Beranda',
                'type' => 'link',
                'url' => route('beranda.edit'),
            ],
            [
                'name' => 'Visi dan Misi',
                'type' => 'link',
                'url' => route('visi-misi.edit'),
            ],
            [
                'name' => 'Struktur Organisasi',
                'type' => 'dropdown',
                'urls' => [route('pegawai.edit'), route('struktur-organisasi.edit')],
                'items' => [
                    ['name' => 'Pegawai', 'url' => route('pegawai.edit')],
                    ['name' => 'Struktur Organisasi', 'url' => route('struktur-organisasi.edit')],
                ],
            ],
            [
                'name' => 'Dokumen Publik',
                'type' => 'link',
                'url' => route('dokumen-publik.edit'),
            ],
            [
                'name' => 'Artikel',
                'type' => 'dropdown',
                'urls' => [route('berita.admin-index'), route('informasi.admin-index')],
                'items' => [
                    ['name' => 'Berita', 'url' => route('berita.admin-index')],
                    ['name' => 'Informasi', 'url' => route('informasi.admin-index')],
                ],
            ],
        ];
        
        $this->currentRoute = request()->url();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav.sidebar');
    }
}
