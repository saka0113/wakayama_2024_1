<x-app-layout>
  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
  @endpush

  <x-slot name="header"></x-slot>

  <div>
    <h1>{{ $message }}</h1>
    <div class="square_contents">
      @foreach ($articles as $article)
        <div class="square_content">
          <a href='{{ route("article.show", ["id" => $article->id]) }}'>
            <img class="square_image" src="{{ asset('storage/' . $article->image_path) }}" alt="Article Image">
          </a>
          <div class="icon_box">
            <!-- クリック時に'いいね'のカウントが増えるようにする -->
            @include('favorite')
            <!-- キープも同様 -->
            <img class="icon_size" alt="" src="{{ asset('images/icon.svg') }}">
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <!-- コメントのポップアップ -->
  <div id="commentPopup" class="popup-overlay" style="display:none;">
    <div class="popup-content">
      <form id="commentForm" action="{{ route('comment.store') }}" method="POST">
        @csrf
        <textarea name="comment" placeholder="コメントを入力してください"></textarea>
        <input type="hidden" name="article_id" id="articleId">
        <button type="submit">送信</button>
      </form>
    </div>
  </div>
  <script src="{{ asset('js/comment.js') }}"></script>
</x-app-layout>