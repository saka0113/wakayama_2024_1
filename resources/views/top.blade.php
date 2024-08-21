<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/top.css') }}" />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Yomogi:wght@400&display=swap"
        />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400&display=swap"
        />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap"
        />
    @endpush

    <div class="top">
        <header class="title">
            <div class="title-child"></div>
            <a class="a">和歌山うちわ飯</a>
        </header>
        <section class="location">
            <div class="googlemap-parent">
                <img
                    class="googlemap-icon"
                    alt=""
                    src="{{ asset('images/googlemap@2x.png') }}"
                    id="googlemapImage"
                />
                <img
                    class="kensaku-icon"
                    loading="lazy"
                    alt=""
                    src="{{ asset('images/kensaku.svg') }}"
                    id="kensaku"
                />
            </div>
        </section>
        <section class="content">
            <div class="toukou" id="toukouContainer">
                <div class="toukou-child"></div>
                <div class="toukou-wrapper">
                    <img class="toukou-icon" alt="" src="{{ asset('images/toukou.svg') }}" />
                </div>
                <div class="div">投稿</div>
            </div>
        </section>
        <section class="content1">
            <div class="mypage" id="mypageContainer">
                <div class="profile-picture"></div>
                <img
                    class="profile-icon"
                    loading="lazy"
                    alt=""
                    src="{{ asset('images/vector.svg') }}" />
                <div class="my-page-label">
                    <div class="div1">マイページ</div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var googlemapImage = document.getElementById("googlemapImage");
                if (googlemapImage) {
                    googlemapImage.addEventListener("click", function (e) {
                        window.location.href = "{{ url('list') }}";
                    });
                }
                
                var kensaku = document.getElementById("kensaku");
                if (kensaku) {
                    kensaku.addEventListener("click", function (e) {
                        // Please sync "searchcategory" to the project
                    });
                }
                
                var toukouContainer = document.getElementById("toukouContainer");
                if (toukouContainer) {
                    toukouContainer.addEventListener("click", function (e) {
                        window.location.href = "{{ url('post') }}";
                    });
                }
                
                var mypageContainer = document.getElementById("mypageContainer");
                if (mypageContainer) {
                    mypageContainer.addEventListener("click", function (e) {
                        // Please sync "proflie（たぶんいらない）" to the project
                    });
                }
            });
        </script>
    @endpush
</x-app-layout>
