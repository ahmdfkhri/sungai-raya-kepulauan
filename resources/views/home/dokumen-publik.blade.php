<x-home-base>
  <h1 class="p-4 mb-2 text-3xl font-bold">Dokumen Publik</h1>
  <div class="grid gap-4 grid-cols-[repeat(auto-fit,minmax(500px,1fr))]">
    @foreach ($dokpubs as $d)
      <div class="p-4 w-full rounded-lg border-gray-200 shadow flex flex-row justify-between items-center">
        <div>
          <span>
            <h1 class="font-semibold text-l">{{ $d['judul'] }}</h1>
          </span>
          <p class="text-gray-500 text-sm">Tahun {{ $d['tahun'] }}</p>
        </div>
        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center bg-blue-700 text-white rounded-md gap-2">
          Unduh
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01"/>
          </svg>          
        </a>
      </div>
    @endforeach
  </div>
</x-home-base>