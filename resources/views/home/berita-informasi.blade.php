<x-home-base>
  <main class="flex flex-col gap-4">
    <x-news-container container-title="Berita Terkini" container-description="Dapatkan Update Terbaru dari Sumber Terpercaya" :container-url="route('berita')"/>
    <hr>
    <x-news-container container-title="Informasi Penting" container-description="Pengumuman dan Informasi Penting yang Harus Anda Ketahui" :container-url="route('informasi')"/>
    <hr>
    <x-news-container container-title="Paling Sering Dilihat" container-description="Berita Populer yang Sedang Hangat Dibicarakan" :container-url="route('berita')"/>
  </main>
</x-home-base>