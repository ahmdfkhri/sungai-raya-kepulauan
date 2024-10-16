<x-home-base>
  <main class="flex flex-col gap-4 items-center">
    <div class="flex flex-col gap-4 lg:w-3/4">
      <h1 class="text-3xl font-bold">
        Visi
      </h1>
      <ol class="list-decimal ml-5 flex flex-col gap-4">
        @foreach ($vmData as $vm)
          @if ($vm['tipe'] == 'visi')
            <li>{{ $vm['desc'] }}</li>
          @endif
        @endforeach
      </ol>
    </div>
    <hr class="h-1 my-8 bg-gray-200 border-0 dark:bg-gray-700 w-full">
    <div class="flex flex-col gap-4 lg:w-3/4">
      <h1 class="text-3xl font-bold">
        Misi
      </h1>
      <ol class="list-decimal ml-5 flex flex-col gap-4">
        @foreach ($vmData as $vm)
          @if ($vm['tipe'] == 'misi')
            <li>{{ $vm['desc'] }}</li>
          @endif
        @endforeach
      </ol>
    </div>
  </main>

</x-home-base>