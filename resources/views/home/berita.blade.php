<x-home-base title="Berita | Sungai Raya Kepulauan">
  <h1 class="text-3xl font-bold p-4">
    Berita Pagination
  </h1>
  
  <div class="grid gap-4 grid-cols-[repeat(auto-fit,minmax(300px,1fr))] justify-items-center">
    @foreach($berita as $item)
      <x-card.article-card 
      :thumbnail-url="$item['thumbnail']"
      :title="$item['title']"
      :publish-date="$item['published_at']"
      :tag="$item['tag']"
      :description="$item['firstContent']['value']"
      :article-url="route('berita.index').'/'.$item['slug']"
      :views="$item['views']"
      />
    @endforeach
  </div>
  
  <div class="pagination my-4">
    {{ $berita->links('pagination::tailwind') }}
  </div>
</x-home-base>