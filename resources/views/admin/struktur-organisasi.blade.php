@props($levels = ["Level 1", "Level 2", "Level 3", "Level 4", "Level 5", 'Level 6'])
<x-admin-base>
  <main class="flex flex-col gap-4 items-center">
    <h1 class="text-3xl font-bold">
      Edit Struktur Organisasi
    </h1>
    @foreach ($levels as $index => $l)
      @if ($index != 0)
      <hr class="h-1 my-8 bg-gray-200 border-0 dark:bg-gray-700 w-full">
      @endif
      <h2 class="text-xl font-semibold">
        {{ $l }}
      </h2>
      <div>Tambahkan Pada Level {{ $index+1 }}</div>
      <form action="{{ route('struktur-organisasi.store') }}" method="POST" class="flex flex-col gap-4 items-center">
        @csrf
        <select name="employee_id" class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @foreach ($employees as $e)
            <option value="{{ $e->id }}">{{ $e->name }}</option>
          @endforeach
        </select>
        <input type="text" name="position" placeholder="Job Title" class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <input type="hidden" name="level" value="{{ $index }}">
        <button class="p-2 bg-blue-700 text-white text-sm rounded-md " type="submit">Tambahkan</button>
      </form>
      <div class="grid w-full md:w-3/4 justify-items-center gap-4 grid-cols-[repeat(auto-fit,_minmax(250px,_1fr))]">
        @foreach ($orgCharts as $e)
          @if ($e->level == $index)
            <div class="rounded-xl bg-gray-100 flex flex-col justify-center items-center w-3/4 max-w-60">
              <form action="{{ route('struktur-organisasi.delete', $e->id) }}" method="post">
                @csrf
                <button class="p-2 bg-red-700 text-white text-sm rounded-md " type="submit">Hapus</button>
              </form>
              <div class="relative w-full pb-[115%] md:pb-[115%]">
                <img class="absolute top-0 left-0 w-full h-full object-cover rounded-t-lg" src="{{ $e->employee->image }}" alt=""/>
              </div>
              <div class="-mt-2 h-full p-2 w-full rounded-xl border-gray-200 border-2 bg-white z-10">
                <p class="text-center text-wrap">{{ $e->employee->name }}</p>
                <p class="text-center text-wrap font-light text-sm text-blue-500">{{ $e->position }}</p>
              </div>
            </div>
          @endif
        @endforeach
    </div>
    @endforeach
  </main>

</x-admin-base>