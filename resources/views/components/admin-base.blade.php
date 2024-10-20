<x-base :title="isset($title) ? $title : 'Admin Page'">
  <x-nav.sidebar>
    {{ $slot }}
  </x-nav.sidebar>
</x-base>