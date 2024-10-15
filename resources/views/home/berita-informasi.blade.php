<x-home-base>
  <main class="flex flex-col gap-4">
    <x-article-container category="newest" container-title="Berita Terkini" container-description="Dapatkan Update Terbaru dari Sumber Terpercaya" :container-url="route('berita')"/>
    <hr>
    <x-article-container category="important" container-title="Informasi Penting" container-description="Pengumuman dan Informasi Penting yang Harus Anda Ketahui" :container-url="route('informasi')"/>
    <hr>
    <x-article-container category="popular" container-title="Paling Sering Dilihat" container-description="Berita Populer yang Sedang Hangat Dibicarakan" :container-url="route('berita')"/>
  </main>
</x-home-base>