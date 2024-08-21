<x-app-layout>
  @push('styles')
  <link rel="stylesheet" href="{{ asset('css/create.css') }}">
  <link rel="stylesheet" href="{{ asset('css/top.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/list.css') }}">
  @endpush
    <header class="title">
        <div class="title-child"></div>
        <a class="a">和歌山うちわ飯</a>
    </header>

  <div>
    <h1>paiza bbs</h1>
    <p>{{ $message }}</p>
    <div class="square_contents">
        @foreach ($articles as $article)
            <div class="square_content">
                <a href="./{{$article->content}}"><img class="square_image" src="{{ $article->content }}"></a>
                <p>test</p>
            </div>
        @endforeach
    </div>
  </div>
</x-app-layout>