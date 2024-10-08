<x-app-layout>
  @push('styles')
  <link rel="stylesheet" href="{{ asset('css/create.css') }}">
  @endpush

  <x-slot name="header"></x-slot>

  <div class="post">
    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div>
        <div class="frame-image frame-child10" id="upload-div">
          <img
            class="vector-icon"
            loading="lazy"
            alt="Image preview"
            id="previewImage"
            src="{{ asset('images/vector1.svg') }}" />
          <input type="file" name="image" id="image" style="opacity: 0;" required>
        </div>
        <div class="textarea">
          <input class="value" name="content" placeholder="コメント" type="text" />
        </div>
        
        <!-- hiddenフィールドでクエリパラメータを保持 -->
        <input type="hidden" name="genre" id="selectedGenre" >
        <input type="hidden" name="ninzu" id="selectedNinzu" >
        <input type="hidden" name="price" id="selectedPrice" >
        <input type="hidden" name="feature" id="selectedFeature" >

        <!-- カテゴリのポップアップ -->
        <div id="categoryPopup" class="popup-overlay" style="display:none;">
          <div class="popup-content">
            @include('category') <!-- category.blade.phpの内容をインクルード -->
          </div>
        </div>

        <div class="flex category" id="categoryContainer">
          <div class="tag-wrapper">
            <img class="tag-icon" loading="lazy" alt="" src="{{ asset('images/tag.svg') }}" />
          </div>
          <div class="wrapper">
            <div class="div2">カテゴリを追加</div>
          </div>
          <div class="vector-wrapper">
            <img class="vector-icon1" loading="lazy" alt="" src="{{ asset('images/vector-1.svg') }}" />
          </div>
        </div>

        <!-- 場所のポップアップ -->
        <div id="placePopup" class="popup-overlay" style="display:none;">
          <div class="popup-content">
            @include('place') <!-- place.blade.phpの内容をインクルード -->
          </div>
        </div>

        <div class="flex place" id="placeContainer">
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
          <button class="flex toukou1" id="toukou" type="submit">
            <div class="post-icon">
              <img
                class="add-icon"
                loading="lazy"
                alt=""
                src="{{ asset('images/hikouki.svg') }}" />
            </div>
            <div class="div4">投稿</div>
          </button>
        </div>
      </div>
    </form>
  </div>

  <script>
    document.getElementById('upload-div').addEventListener('click', function() {
      document.getElementById('image').click();
    });

    document.getElementById('image').addEventListener('change', function(event) {
      var file = event.target.files[0];
      if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('previewImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    });

    // カテゴリを追加をクリックしたときの処理
    var categoryContainer = document.getElementById("categoryContainer");
    if (categoryContainer) {
      categoryContainer.addEventListener("click", function() {
        var popup = document.getElementById("categoryPopup");
        popup.style.display = "flex";
      });
    }

    // 場所を追加をクリックしたときの処理
    var placeContainer = document.getElementById("placeContainer");
    if (placeContainer) {
      placeContainer.addEventListener("click", function() {
        var popup = document.getElementById("placePopup");
        popup.style.display = "flex";
      });
    }

    // ポップアップを閉じる処理
    var popups = document.querySelectorAll('.popup-overlay');
    popups.forEach(function(popup) {
      popup.addEventListener("click", function(event) {
        if (event.target === this) {
          this.style.display = "none";
        }
      });
    });
    
    var toukou = document.getElementById("toukou");
    if (toukou) {
      toukou.addEventListener("click", function(e) {
        // Please sync "proflie（たぶんいらない）" to the project
      });
    }
  </script>
</x-app-layout>
