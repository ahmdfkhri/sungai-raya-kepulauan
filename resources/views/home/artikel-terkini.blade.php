<x-home-base title="Artikel Terkini | Sungai Raya Kepulauan">
  <x-article-slider 
    type="newest"
    slider-title="Berita Terkini"
    slider-description="Dapatkan Update Terbaru dari Sumber Terpercaya"
    slider-url="{{ route('berita.index') }}"
  />
  <x-article-slider 
    type="important"
    slider-title="Informasi Penting"
    slider-description="Pengumuman dan Informasi Penting yang Harus Anda Ketahui"
    slider-url="{{ route('informasi.index') }}"
  />
  <x-article-slider 
    type="popular"
    slider-title="Paling Sering Dilihat"
    slider-description="Berita Populer yang Sedang Hangat Dibicarakan"
    slider-url="{{ route('berita.index') }}"
  />
</x-home-base>