<div>
  <h2 id="accordion-collapse-heading-{{ $index }}">
    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 rounded-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-{{ $index }}" aria-expanded="false" aria-controls="accordion-collapse-body-{{ $index }}">
      <div class="text-left flex flex-col gap-2">
        <div class="text-left font-semibold text-l">
          {{ $title }}
        </div>
        <div class="text-left font-normal text-sm">
          Tahun <span class="text-blue-500">{{ $year }}</span> | Diunggah pada <span class="text-blue-500">{{ $uploadedAt }}</span>
        </div>
      </div>
      <div class="flex flex-row items-center gap-4">
        <a href="{{ $filePath }}" onclick="event.stopPropagation()" class="inline-flex gap-2 items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Download
          <svg class="w-4 h-4 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
          </svg>
        </a>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
      </div>
    </button>
  </h2>
  <div id="accordion-collapse-body-{{ $index }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $index }}">
    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 -mt-2 rounded-b-xl">
      <p class="mb-2 text-gray-500 dark:text-gray-400">
        {{ $description }}
      </p>      
    </div>
  </div>
</div>
