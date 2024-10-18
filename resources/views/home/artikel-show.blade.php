<x-home-base :title="Str::limit($berita->title, 20)">
  <h1 class="text-3xl font-bold">
    {{ $berita->title }}
  </h1>
  <h2>{{ $berita->published_at }}</h2>
  <h2>{{ $berita->tag }}</h2>
  <img src="{{ $berita->thumbnail }}" alt="">
  <div class="container">
    @foreach ($berita->contents as $c)
      @if ($c->type == 'text')
        <p>{{ $c->value }}</p>
      @elseif ($c->type == 'image')
        <img src="{{ $c->value }}" alt="">
      @endif
    @endforeach
  </div>
</x-home-base>