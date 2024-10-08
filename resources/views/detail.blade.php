<x-app-layout>
  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
  @endpush

  <x-slot name="header"></x-slot>

  <div class="detail">
    <main class="content2">
      <div class="content-child"></div>
      <div class="inner-content">
        <button type="button" onClick="history.back()">
          <img class="inner-content-child" loading="lazy" alt="Description of image"
            src="{{ asset('images/group-43.svg') }}" /></button>

      </div>
      <section>
        <!-- 写真　全体が映るよう"object-fit: contain;"を使う -->
        <img class="image-placeholder-wrapper" src="{{ asset('storage/' . $article->image_path) }}" alt="Article Image">
      </section>
      <section class="comment-wrapper-wrapper">
        <div class="comment-wrapper">
          <div class="comment-wrapper-child"></div>
          <div class="comment-box">
            <div class="comment-content">
              <div class="comment-header">
                <div class="icon1" id="icon"></div>
                <div class="user-name">
                  <div class="relic">{{ $article->user->name }}</div>
                </div>
              </div>
              <div>{{$article->content}}</div>
            </div>
          </div>
          <!-- クリック時に'いいね'のカウントが増えるようにする -->
          @include('favorite')

          <img class="share-icon" loading="lazy" alt="Share icon" src="{{ asset('images/share.svg') }}" />
        </div>
      </section>
    </main>
  </div>
  <!-- コメントを表示する部分 -->
  <div class="comments-section">
    <h3>コメント</h3>
    @foreach ($article->comments as $comment)
    <div class="comment">
      <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>
    </div>
  @endforeach
  </div>
  </section>

  @push('scripts')
    <script>
    var text = document.getElementById("text");
    if (text) {
      text.addEventListener("click", function (e) {
      window.location.href = "{{ url('top1.html') }}";
      });
    }

    var title = document.getElementById("title");
    if (title) {
      title.addEventListener("click", function (e) {
      window.location.href = "{{ url('top1.html') }}";
      });
    }

    var icon = document.getElementById("icon");
    if (icon) {
      icon.addEventListener("click", function (e) {
      // Please sync "profile（たぶんいらない）" to the project
      });
    }
    </script>
  @endpush
</x-app-layout>