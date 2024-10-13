<div>
  <h1>Berita Populer</h1>
  <div class="flex flex-col lg:flex-row lg:overflow-x-auto lg:whitespace-nowrap lg:w-full gap-5">
    @foreach ($news as $n)
      <x-news-card :title="$n['title']" :imageUrl="$n['imageUrl']" :url="$n['url']"/>
    @endforeach
  </div>
</div>