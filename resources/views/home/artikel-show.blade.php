<x-home-base :title="Str::limit($article->title, 20)">
  <h1 class="text-3xl font-bold">
    {{ $article->title }}
  </h1>
  <h2>{{ $article->published_at }}</h2>
  <h2>{{ $article->tag }}</h2>
  <img src="{{ $article->thumbnail }}" alt="">
  <div class="container">
    @foreach ($article->contents as $c)
      @if ($c->type == 'text')
        <p>{{ $c->value }}</p>
      @elseif ($c->type == 'image')
        <img src="{{ $c->value }}" alt="">
      @endif
    @endforeach
  </div>
</x-home-base>