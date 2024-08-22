<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/place.css') }}" />
    @endpush

    <div class="place2">
        <div class="frame">
            <a class="a4">エリアの選択</a>
        </div>
        <main class="main-place">
            <!-- 紀北 -->
            <div class="place-section">
                <div class="place-title">紀北</div>
                <div class="place-items">
                    <a href="" class="placename">和歌山市</a>
                    <a href="" class="placename">海南市</a>
                    <a href="" class="placename">紀の川市</a>
                    <a href="" class="placename">岩出市</a>
                    <a href="" class="placename">橋本市</a>
                    <a href="" class="placename">かつらぎ町</a>
                    <a href="" class="placename">九度山町</a>
                    <a href="" class="placename">高野町</a>
                </div>
            </div>

            <!-- 紀中 -->
            <div class="place-section">
                <div class="place-title">紀中</div>
                <div class="place-items">
                    <a href="" class="placename">御坊市</a>
                    <a href="" class="placename">田辺市</a>
                    <a href="" class="placename">みなべ町</a>
                    <a href="" class="placename">日高町</a>
                    <a href="" class="placename">印南町</a>
                    <a href="" class="placename">由良町</a>
                </div>
            </div>

            <!-- 紀南 -->
            <div class="place-section">
                <div class="place-title">紀南</div>
                <div class="place-items">
                    <a href="" class="placename">南紀白浜町</a>
                    <a href="" class="placename">上富田町</a>
                    <a href="" class="placename">すさみ町</a>
                    <a href="" class="placename">串本町</a>
                    <a href="" class="placename">那智勝浦町</a>
                    <a href="" class="placename">本宮町</a>
                    <a href="" class="placename">熊野市</a>
                    <a href="" class="placename">新宮市</a>
                </div>
            </div>

        </main>
    </div>
</x-app-layout>
