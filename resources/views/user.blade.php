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
    <ul class="tab-group">
      @foreach (range(1, 2) as $i)
      <li class="tab" id="tab{{ $i }}">
        <div class="tab-contents">
          <div class="icon-badge">
            <img class="icon" id="img{{ $i }}" loading="lazy" alt="" src="{{ asset($tabindex == $i ? "images/iconmonstr-{$i}-1.svg" : "images/iconmonstr-{$i}-2.svg") }}" />
            <div class="shape" style="display: {{ $tabindex == $i ? '' : 'none' }};"></div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
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
    document.addEventListener("DOMContentLoaded", function() {
      const tabs = [{
          tabId: "tab1",
          route: "{{ route('user', ['tabindex' => 1]) }}"
        },
        {
          tabId: "tab2",
          route: "{{ route('user', ['tabindex' => 2]) }}"
        }
      ];

      tabs.forEach(({
        tabId,
        route
      }) => {
        document.getElementById(tabId).addEventListener("click", () => window.location.href = route);
      });
    });
  </script>
  @endpush
</x-app-layout>