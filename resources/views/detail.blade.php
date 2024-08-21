<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
    @endpush

    <x-slot name="header"></x-slot>

    <div class="detail">
      <main class="content2">
        <div class="content-child"></div>
        <div class="inner-content">
          <img
            class="inner-content-child"
            loading="lazy"
            alt="Description of image"
            src="{{ asset('images/group-43.svg') }}"
          />
        </div>
        <section class="image-placeholder-wrapper">
          <textarea class="image-placeholder" rows="16" cols="19"></textarea>
        </section>
        <section class="comment-wrapper-wrapper">
          <div class="comment-wrapper">
            <div class="comment-wrapper-child"></div>
            <div class="comment-box">
              <div class="comment-content">
                <div class="comment-header">
                  <div class="icon1" id="icon"></div>
                  <div class="user-name">
                    <div class="relic">Relic太郎</div>
                  </div>
                </div>
                <div class="container">
                  <div class="div5">コメント、#〇〇</div>
                </div>
              </div>
            </div>
            <img
              class="iine-icon"
              loading="lazy"
              alt="Like icon"
              src="{{ asset('images/iine.svg') }}"
            />

            <img
              class="share-icon"
              loading="lazy"
              alt="Share icon"
              src="{{ asset('images/share.svg') }}"
            />
          </div>
        </section>
      </main>
    </div>

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
