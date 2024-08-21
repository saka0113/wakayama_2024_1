<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/top.css') }}" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Yomogi:wght@400&display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400&display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" />
    @endpush

    <div class="top">
        <header class="title">
            <div class="title-child"></div>
            <a class="a">和歌山うちわ飯</a>
        </header>
        <section class="location">
            <div class="googlemap-parent">
                <img class="googlemap-icon" alt="" src="{{ asset('images/googlemap@2x.png') }}" id="googlemapImage" />
                <img class="kensaku-icon" loading="lazy" alt="" src="{{ asset('images/kensaku.svg') }}" id="kensaku" />
            </div>
        </section>
        <section class="content" id="contentSection">
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
                <img class="profile-icon" loading="lazy" alt="" src="{{ asset('images/vector.svg') }}" />
                <div class="my-page-label">
                    <div class="div1">マイページ</div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var contentSection = document.getElementById("toukouContainer");
                if (contentSection) {
                    contentSection.addEventListener("click", function () {
                        window.location.href = "{{ route('articles.create') }}";
                    });
                }
            });
        </script>
    @endpush
</x-app-layout>
