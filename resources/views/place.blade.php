<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/place.css') }}" />
    @endpush

    <div class="place2">
        <div class="frame">
            <a class="a4">エリアの選択</a>
        </div>
        <main class="main-place">
            <input name="city_id" id="city_id" style="opacity: 0;">
            <!-- 紀北 -->
            <div class="place-section">
                <div class="place-title">紀北</div>
                <div class="place-items" id="kihoku-items">
                    <!-- 紀北エリアのリンクがここに生成されます -->
                </div>
            </div>

            <!-- 紀中 -->
            <div class="place-section">
                <div class="place-title">紀中</div>
                <div class="place-items" id="kichu-items">
                    <!-- 紀中エリアのリンクがここに生成されます -->
                </div>
            </div>

            <!-- 紀南 -->
            <div class="place-section">
                <div class="place-title">紀南</div>
                <div class="place-items" id="kinan-items">
                    <!-- 紀南エリアのリンクがここに生成されます -->
                </div>
            </div>
        </main>
    </div>

    @push('scripts')
        <script>
            const cityIdMap = {
                "和歌山市": 1,
                "海南市": 2,
                "紀の川市": 3,
                "岩出市": 4,
                "橋本市": 5,
                "かつらぎ町": 6,
                "九度山町": 7,
                "高野町": 8,
                "紀美野町": 9,
                "有田市": 10,
                "御坊市": 11,
                "田辺市": 12,
                "有田川町": 13,
                "湯浅町": 14,
                "広川町": 15,
                "由良町": 16,
                "日高町": 17,
                "美浜町": 18,
                "日高川町": 19,
                "印南町": 20,
                "みなべ町": 21,
                "上富田町": 22,
                "白浜町": 23,
                "すさみ町": 24,
                "新宮市": 25,
                "古座川町": 26,
                "串本町": 27,
                "那智勝浦町": 28,
                "太地町": 29,
                "北山村": 30
            };

            const kihokuCities = ["和歌山市", "海南市", "紀の川市", "岩出市", "橋本市", "かつらぎ町", "九度山町", "高野町", "紀美野町"];
            const kichuCities = ["有田市", "御坊市", "田辺市", "有田川町", "湯浅町", "広川町", "由良町", "日高町", "美浜町", "日高川町", "印南町", "みなべ町", "上富田町", "白浜町", "すさみ町"];
            const kinanCities = ["新宮市", "古座川町", "串本町", "那智勝浦町", "太地町", "北山村"];

            function createLinks(cities, containerId) {
                const container = document.getElementById(containerId);

                cities.forEach(city => {
                    const cityId = cityIdMap[city];
                    if (cityId) {
                        const link = document.createElement('a');
                        link.className = 'placename';
                        link.innerText = city;
                        link.addEventListener('click', (event) => {
                            document.getElementById('city_id').value = cityId;
                            document.getElementById('placePopup').style.display = 'none';
                        });
                        container.appendChild(link);
                    }
                });
            }

            // 各エリアにリンクを生成
            createLinks(kihokuCities, 'kihoku-items');
            createLinks(kichuCities, 'kichu-items');
            createLinks(kinanCities, 'kinan-items');
        </script>
    @endpush
</x-app-layout>
