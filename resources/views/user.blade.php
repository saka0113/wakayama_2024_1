<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/list.css') }}" />
    @endpush

    <x-slot name="header"></x-slot>

    <div class="proflie">
      <div class="mypage_line">
        <a class="circle">image</a>
        <p class="fontbigger">Relic太郎</p>
      </div>
      <div class="tabs-wrapper">
        <div class="tabs">
          <div class="tab-group">
            <div class="tab-1">
              <div class="state-layer">
                <div class="tab-contents">
                  <div class="icon-badge">
                    <img
                      class="icon"
                      loading="lazy"
                      alt=""
                      src="{{ asset('images/profile1.svg') }}"
                    />
                    <div class="badges">
                      <div class="spacer"></div>
                    </div>
                  </div>
                  <div class="indicator">
                    <div class="shape"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-2">
              <div class="state-layer1">
                <div class="tab-contents1">
                  <div class="icon-badge1">
                    <img
                      class="icon1"
                      loading="lazy"
                      alt=""
                      src="{{ asset('images/profile2.svg') }}"
                    />
                    <div class="badges1">
                      <div class="spacer1"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-3">
              <div class="state-layer2">
                <div class="tab-contents2">
                  <div class="icon-badge2">
                    <img
                      class="icon2"
                      loading="lazy"
                      alt=""
                      src="{{ asset('images/profile3.svg') }}"
                    />
                    <div class="badges2">
                      <div class="spacer2"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="divider">
            <div class="divider1"></div>
          </div>
        </div>
      </div>
      <div class="square_contents">
      @if ($articles->isNotEmpty())
        @foreach ($articles as $article)
        <div class="square_content">
          <a href="{{ asset('storage/' . $article->image_path) }}"><img class="square_image" src="{{ asset('storage/' . $article->image_path) }}" alt="Article Image"></a>
        </div>
        @endforeach
      @endif
    </div>





    </div>

    @push('scripts')
        <script>
        var text = document.getElementById("text");
        if (text) {
            text.addEventListener("click", function (e) {
            // Please sync "top" to the project
            });
        }
        
        var text1 = document.getElementById("text1");
        if (text1) {
            text1.addEventListener("click", function (e) {
            // Please sync "top" to the project
            });
        }
        
        var rectangle = document.getElementById("rectangle");
        if (rectangle) {
            rectangle.addEventListener("click", function (e) {
            // Please sync "detail" to the project
            });
        }
        </script>
    @endpush
</x-app-layout>
