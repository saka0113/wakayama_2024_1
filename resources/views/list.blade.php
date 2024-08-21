<x-app-layout>
  @push('styles')
  <link rel="stylesheet" href="{{ asset('css/list.css') }}">
  @endpush

  <x-slot name="header"></x-slot>

  <div>
    <div class="square_contents">
      @foreach ($articles as $article)
      <div class="square_content">
        <a href="{{ asset('storage/' . $article->image_path) }}"><img class="square_image" src="{{ asset('storage/' . $article->image_path) }}" alt="Article Image"></a>
        <div class="icon_box ">
          <img alt="" src="{{ asset('images/icon.svg') }}">
          <!-- クリック時に'いいね'のカウントが増えるようにする -->
          <img alt="" src="{{ asset('images/icon-11.svg') }}">
          <!-- キープも同様 -->
        </div>
      </div>
      @endforeach
    </div>
  </div>
</x-app-layout>