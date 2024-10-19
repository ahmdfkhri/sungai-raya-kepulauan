<x-home-base title="Berita | Sungai Raya Kepulauan">
  <h1 class="text-3xl font-bold p-4">
    Semua Berita
  </h1>

  <div>
    <!-- Form pencarian dan sorting -->
    <form action="{{ route('berita.index') }}" method="GET" class="flex flex-col md:flex-row items-center gap-4 p-4">
      <!-- Input pencarian -->
      <div class="relative w-full md:w-1/2 flex flex-row gap-4">
        <input type="text" name="search" placeholder="Cari berita..." value="{{ request('search') }}" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">Cari</button>
      </div>
  
      <!-- Dropdown sorting -->
      <div class="relative flex flex-col md:flex-row items-center gap-2">
        <h1 class="font-semibold">Urutkan Berdasarkan:</h1>
        <select name="sort" onchange="this.form.submit()" class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
          <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
          <option value="most_viewed" {{ request('sort') == 'most_viewed' ? 'selected' : '' }}>Paling Banyak Dilihat</option>
          <option value="least_viewed" {{ request('sort') == 'least_viewed' ? 'selected' : '' }}>Paling Sedikit Dilihat</option>
        </select>
      </div>
    </form>
  </div>

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
    {{ $berita->appends(request()->query())->links('pagination::tailwind') }}
  </div>
</x-home-base>