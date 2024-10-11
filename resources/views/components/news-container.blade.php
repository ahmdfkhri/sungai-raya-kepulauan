<div>
  <h1>Daftar Berita</h1>
  @foreach ($news as $n)
    <x-news-card :title="$n['title']" :imageUrl="$n['imageUrl']" :url="$n['url']" />
  @endforeach
</div>