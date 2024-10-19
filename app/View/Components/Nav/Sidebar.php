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
                'url' => route('admin.beranda'),
            ],
            [
                'name' => 'Visi dan Misi',
                'type' => 'link',
                'url' => route('admin.visi-misi'),
            ],
            [
                'name' => 'Struktur Organisasi',
                'type' => 'dropdown',
                'urls' => [],
                'items' => [
                    ['name' => 'Pegawai', 'url' => route('pegawai.edit')]
                ],
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
                'name' => 'Artikel',
                'type' => 'dropdown',
                'urls' => [route('artikel-terkini'), route('berita.index'), route('informasi.index')],
                'items' => [
                    ['name' => 'Terkini', 'url' => route('artikel-terkini')],
                    ['name' => 'Berita', 'url' => route('berita.index')],
                    ['name' => 'Informasi', 'url' => route('informasi.index')],
                ],
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav.sidebar');
    }
}
