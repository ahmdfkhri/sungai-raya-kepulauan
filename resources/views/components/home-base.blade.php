<x-base :title="isset($title) ? $title : null">
  <x-navbar/>
  <main class="mt-20 mx-5 mb-5">
    {{ $slot }}
  </main>
  <x-footer/>
</x-base>