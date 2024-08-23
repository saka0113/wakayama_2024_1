<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/top.css') }}" />
    @endpush
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Click Event</title> -->

    <x-slot name="header"></x-slot>

    <div class="top">
        <section class="location">
            <div id="map" class="map-style"></div>
            <div id="location-info"></div>
            <div class="googlemap-parent">
                <img class="kensaku-icon" loading="lazy" alt="" src="{{ asset('images/kensaku.svg') }}" id="kensaku" />
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
        <section class="content">
            <div class="toukou" id="kensakuContainer">
                <div class="toukou-child"></div>
                <div class="toukou-wrapper">
                    <img class="toukou-icon" alt="" src="{{ asset('images/kensaku.svg') }}" />
                </div>
                <div class="div">検索</div>
            </div>
        </section>
    </div>

    <!-- 検索のポップアップ -->
    <div id="searchPopup" class="popup-overlay" style="display:none;">
        <div class="popup-content">
            @include('search') <!-- search.blade.phpの内容をインクルード -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var googlemapImage = document.getElementById("googlemapImage");
            if (googlemapImage) {
                googlemapImage.addEventListener("click", function(e) {
                    window.location.href = "{{ url('list') }}";
                });
            }

            var kensaku = document.getElementById("kensaku");
            if (kensaku) {
                kensaku.addEventListener("click", function(e) {
                    // Please sync "searchcategory" to the project
                });
            }

            var toukouContainer = document.getElementById("toukouContainer");
            if (toukouContainer) {
                toukouContainer.addEventListener("click", function(e) {
                    window.location.href = '{{ route("articles.create") }}';
                });
            }

            // 検索アイコンをクリックしたときの処理
            var kensakuIcon = document.getElementById("kensakuContainer");
            if (kensakuIcon) {
                kensakuIcon.addEventListener("click", function() {
                    var popup = document.getElementById("searchPopup");
                    popup.style.display = "flex";
                });
            }
        });
    </script>
    <script src="{{ asset('/js/map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRXSG9YD09Kr9zE8j67ukkgNzpSMW7KKU&callback=initMap" async
        defer></script>
</x-app-layout>