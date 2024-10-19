@props($levels = ["Level 1", "Level 2", "Level 3", "Level 4", "Level 5", 'Level 6'])
<x-home-base  title="Struktur Organisasi | Sungai Raya Kepulauan">
  <main class="flex flex-col gap-4 items-center">
    <h1 class="text-3xl font-bold m-4">
      Struktur Organisasi
    </h1>
    @foreach ($levels as $index => $l)
      @if ($index != 0)
      <hr class="h-1 my-8 bg-gray-200 border-0 dark:bg-gray-700 w-full">
      @endif
      <h2 class="text-xl font-semibold">
        {{ $l }}
      </h2>
      <div class="grid w-full md:w-3/4 justify-items-center gap-4 grid-cols-[repeat(auto-fit,_minmax(250px,_1fr))]">
        @foreach ($orgCharts as $e)
          @if ($e->level == $index)
            <div class="rounded-xl bg-gray-100 flex flex-col justify-center items-center w-3/4 max-w-60">
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
</x-home-base>