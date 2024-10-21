<x-admin-base>
  <h1 class="text-3xl font-bold">
    Edit Visi Misi
  </h1>
  <hr class="h-1 my-8 bg-gray-200 border-0 dark:bg-gray-700 w-full">
  <div>
    <form class="w-full mx-auto" action="{{ route('visi-misi.update') }}" method="POST">
      @csrf
      <label for="vision" class="block mb-2 text-xl font-semibold text-gray-900 dark:text-white">Visi</label>
      <textarea id="vision" name="vision" rows="4" class="block p-3 mb-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment...">{{ $visions->value }}</textarea>
      <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Simpan
      </button>
    </form>
  </div>

  <hr class="h-1 my-8 bg-gray-200 border-0 dark:bg-gray-700 w-full">
  <form action="{{ route('visi-misi.add') }}" method="POST" class="mb-6">
    @csrf
    <label for="new-mission" class="block mb-2 text-xl font-semibold">Tambah Misi Baru</label>
    <textarea id="new-mission" name="value" rows="2" class="block p-3 mb-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
    <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      Tambah Misi
    </button>
  </form>

  @foreach ($missions as $mission)
    <form action="{{ route('visi-misi.update') }}" method="POST" class="mb-4">
      @csrf
      <input type="hidden" name="missions[{{ $mission->id }}][id]" value="{{ $mission->id }}">
      <textarea name="missions[{{ $mission->id }}][value]" rows="2" class="block p-3 mb-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $mission->value }}</textarea>
      <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Update Misi
      </button>
      <a href="{{ route('visi-misi.delete', $mission->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Hapus</a>
    </form>
  @endforeach
</x-admin-base>