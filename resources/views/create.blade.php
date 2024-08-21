<x-app-layout>
  @push('styles')
  <link rel="stylesheet" href="{{ asset('css/create.css') }}">
  @endpush

  <x-slot name="header"></x-slot>

  <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="image">Upload Image:</label>
        <input type="file" name="image" id="image" required>
    </div>
    <!-- Add other article fields here -->
    <button type="submit">Submit</button>
  </form>

  <div class="post">
    <div class="frame-image frame-child10">
      <img
        class="vector-icon"
        loading="lazy"
        alt=""
        src="{{ asset('images/vector1.svg') }}" />
    </div>
    <div class="textarea">
      <input class="value" placeholder="コメント" type="text" />
    </div>
    <div class="flex category" id="categoryContainer">
      <div class="tag-wrapper">
        <img
          class="tag-icon"
          loading="lazy"
          alt=""
          src="{{ asset('images/tag.svg') }}" />
      </div>
      <div class="wrapper">
        <div class="div2">カテゴリを追加</div>
      </div>
      <div class="vector-wrapper">
        <img
          class="vector-icon1"
          loading="lazy"
          alt=""
          src="{{ asset('images/vector-1.svg') }}" />
      </div>
    </div>
    <div class="flex place">
      <div class="map">
        <img
          class="map-icon"
          loading="lazy"
          alt=""
          src="{{ asset('images/map.svg') }}" />
      </div>
      <div class="div3">場所を追加</div>
      <div class="add-icon-wrapper">
        <img
          class="add-icon"
          loading="lazy"
          alt=""
          src="{{ asset('images/vector-2.svg') }}" />
      </div>
    </div>
    <div class="toukou-container">
      <button class="flex toukou1" id="toukou">
        <div class="post-icon">
          <img
            class="add-icon"
            loading="lazy"
            alt=""
            src="{{ asset('images/vector-2.svg') }}" />
        </div>
        <div class="div4">投稿</div>
      </button>
    </div>
  </div>
  <script>
    var text3 = document.getElementById("text3");
    if (text3) {
      text3.addEventListener("click", function(e) {
        window.location.href = "./top1.html";
      });
    }

    var title = document.getElementById("title");
    if (title) {
      title.addEventListener("click", function(e) {
        window.location.href = "./top1.html";
      });
    }

    var categoryContainer = document.getElementById("categoryContainer");
    if (categoryContainer) {
      categoryContainer.addEventListener("click", function() {
        var popup = document.getElementById("categoryPopup");
        if (!popup) return;
        var popupStyle = popup.style;
        if (popupStyle) {
          popupStyle.display = "flex";
          popupStyle.zIndex = 100;
          popupStyle.backgroundColor = "rgba(113, 113, 113, 0.3)";
          popupStyle.alignItems = "center";
          popupStyle.justifyContent = "center";
        }
        popup.setAttribute("closable", "");

        var onClick =
          popup.onClick ||
          function(e) {
            if (e.target === popup && popup.hasAttribute("closable")) {
              popupStyle.display = "none";
            }
          };
        popup.addEventListener("click", onClick);
      });
    }

    var toukou = document.getElementById("toukou");
    if (toukou) {
      toukou.addEventListener("click", function(e) {
        // Please sync "proflie（たぶんいらない）" to the project
      });
    }
  </script>
</x-app-layout>