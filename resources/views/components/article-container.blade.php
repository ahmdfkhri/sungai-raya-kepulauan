<div class="lg:min-w-full">
  <div class="p-4 mb-4 w-full rounded-lg border-gray-200 shadow flex flex-row justify-between items-center">
    <div>
      <span>
        <h1 class="font-bold text-xl">{{ $containerTitle }}</h1>
        <ion-icon name="time-outline"></ion-icon>
      </span>
      <p class="text-gray-500 text-sm">{{ $containerDescription }}</p>
    </div>
    <a href="{{ isset($containerUrl) ? $containerUrl : '/' }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-blue-700">
      Lebih Banyak
      <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
      </svg>
    </a>
  </div>
  <div class="flex flex-col lg:flex-row lg:overflow-x-auto lg:whitespace-nowrap lg:w-full gap-5">
    @foreach ($articles as $a)
      <x-article-card :imageUrl="$a['imageUrl']" :date="$a['date']" :tag="$a['tag']" :title="$a['title']" :url="$a['url']" :description="$a['description']" :views="$a['views']"/>
    @endforeach
  </div>
</div>