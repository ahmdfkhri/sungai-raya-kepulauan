<x-home-base title="Dokumen Publik | Sungai Raya Kepulauan">
  <h1 class="text-3xl font-bold p-4">
    Dokumen Publik
  </h1>
  <div>
    <!-- Form pencarian dan sorting -->
    <form action="{{ route('dokumen-publik') }}" method="GET" class="flex flex-col md:flex-row items-center gap-4 p-4">
      <!-- Input pencarian -->
      <div class="relative w-full md:w-1/2 flex flex-row gap-4">
        <input type="text" name="search" placeholder="Cari dokumen..." value="{{ request('search') }}" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">Cari</button>
      </div>
  
      <!-- Dropdown sorting -->
      <div class="relative flex flex-col md:flex-row items-center gap-2">
        <h1 class="font-semibold">Urutkan Berdasarkan:</h1>
        <div class="flex flex-row gap-2">
          <select name="order" onchange="this.form.submit()" class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="created_at" {{ request('order') == 'created_at' ? 'selected' : '' }}>Tanggal Diunggah</option>
            <option value="year" {{ request('order') == 'year' ? 'selected' : '' }}>Tahun Dokumen</option>
          </select>
          <select name="direction" onchange="this.form.submit()" class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Terbaru</option>
            <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Terlama</option>
          </select>
        </div>
      </div>
    </form>
  </div>

  <div id="accordion-collapse" data-accordion="collapse" class="grid gap-4 md:grid-cols-2">
    @foreach ($publicDocuments as $index => $d)
      <x-card.public-document-card
        index="{{ $index }}"
        title="{{ $d->title }}"
        year="{{ $d->year }}"
        description="{{ $d->description }}"
        file-path="{{ $d->file_path }}"
        file-type="{{ $d->file_type }}"
        uploaded-at="{{ $d->created_at }}"
      />
    @endforeach
  </div>
  <div class="pagination my-4">
    {{ $publicDocuments->appends(request()->query())->links('pagination::tailwind') }}
  </div>
</x-home-base>