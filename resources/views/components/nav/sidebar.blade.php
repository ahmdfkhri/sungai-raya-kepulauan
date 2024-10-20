<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
  <span class="sr-only">Open sidebar</span>
  <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
  <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
  </svg>
</button>

<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
  <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
    <a href="{{ route('beranda') }}" class="flex items-center ps-2.5 mb-5">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 me-3 sm:h-7" alt="Flowbite Logo" />
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
    </a>
    <ul class="space-y-2 font-medium">
      @foreach ($navItems as $index => $item)
        {{-- Direct Link Example --}}
        @if ($item['type'] == 'link')
          <li>
            <a href="{{ $item['url'] }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              <span class="ms-3 {{ $currentRoute == $item['url'] ? 'text-blue-500' : '' }}">{{ $item['name'] }}</span>
            </a>
          </li>
        @elseif ($item['type'] == 'dropdown')
          <li>
            {{-- Dropdown Example --}}
            <button type="button" class="flex items-center w-full p-2 text-base {{ in_array($currentRoute, $item['urls']) ? 'text-blue-500' : 'text-gray-900'}} transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example-{{ $index }}" data-collapse-toggle="dropdown-example-{{ $index }}">
              <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{ $item['name'] }}</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg>
            </button>
            <ul id="dropdown-example-{{ $index }}" class="{{ in_array($currentRoute, $item['urls']) ? 'block' : 'hidden' }} py-2 space-y-2">
              @foreach ($item['items'] as $i)  
                <li>
                  <a href="{{ $i['url'] }}" class="flex items-center w-full p-2 {{ $currentRoute == $i['url'] ? 'text-blue-500' : 'text-gray-900' }} transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{ $i['name'] }}</a>
                </li>
              @endforeach
            </ul>
          </li>
        @endif
      @endforeach
    </ul>
  </div>
</aside>

<div class="p-4 sm:ml-64">
  {{ $slot }}
</div>
