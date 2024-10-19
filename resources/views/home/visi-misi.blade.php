<x-home-base title="Visi dan Misi | Sungai Raya Kepulauan">
  <main class="flex flex-col gap-4 items-center">
    <div class="flex flex-col gap-4 lg:w-3/4">
      <h1 class="text-3xl font-bold">
        Visi
      </h1>
      <div class="list-decimal ml-5 flex flex-col gap-4">
        @foreach ($visionMission as $vm)
          @if ($vm->type == 'vision')
            <blockquote class="text-xl italic font-semibold text-gray-900 dark:text-white">
              {{ '"'.$vm->value.'"' }}
            </blockquote>
          @endif
        @endforeach
      </div>
    </div>
    <hr class="h-1 my-8 bg-gray-200 border-0 dark:bg-gray-700 w-full">
    <div class="flex flex-col gap-4 lg:w-3/4">
      <h1 class="text-3xl font-bold">
        Misi
      </h1>
      <ol class="list-decimal ml-5 flex flex-col gap-4">
        @foreach ($visionMission as $vm)
          @if ($vm->type == 'mission')
            <li>{{ $vm->value }}</li>
          @endif
        @endforeach
      </ol>
    </div>
  </main>

</x-home-base>