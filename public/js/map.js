const cityLocations = {
    1: { lat: 34.2260, lng: 135.1675 }, // 和歌山市
    2: { lat: 33.9775, lng: 135.5220 }, // 海南市
    3: { lat: 34.2833, lng: 135.3550 }, // 紀の川市
    4: { lat: 34.2704, lng: 135.3083 }, // 岩出市
    5: { lat: 34.3177, lng: 135.6089 }, // 橋本市
    6: { lat: 34.2894, lng: 135.3897 }, // かつらぎ町
    7: { lat: 34.2841, lng: 135.5858 }, // 九度山町
    8: { lat: 34.2112, lng: 135.5850 }, // 高野町
    9: { lat: 34.1837, lng: 135.4591 }, // 紀美野町
    10: { lat: 34.0633, lng: 135.1331 }, // 有田市
    11: { lat: 33.8883, lng: 135.1527 }, // 御坊市
    12: { lat: 33.7280, lng: 135.3753 }, // 田辺市
    13: { lat: 34.0147, lng: 135.1739 }, // 有田川町
    14: { lat: 34.0514, lng: 135.1756 }, // 湯浅町
    15: { lat: 34.0511, lng: 135.1803 }, // 広川町
    16: { lat: 33.9647, lng: 135.1297 }, // 由良町
    17: { lat: 33.9575, lng: 135.0997 }, // 日高町
    18: { lat: 33.9506, lng: 135.0903 }, // 美浜町
    19: { lat: 33.8975, lng: 135.1369 }, // 日高川町
    20: { lat: 33.8014, lng: 135.2439 }, // 印南町
    21: { lat: 33.7700, lng: 135.3208 }, // みなべ町
    22: { lat: 33.6892, lng: 135.4300 }, // 上富田町
    23: { lat: 33.6792, lng: 135.3483 }, // 白浜町
    24: { lat: 33.5520, lng: 135.4900 }, // すさみ町
    25: { lat: 33.7256, lng: 135.9856 }, // 新宮市
    26: { lat: 33.6239, lng: 135.8700 }, // 古座川町
    27: { lat: 33.4703, lng: 135.7828 }, // 串本町
    28: { lat: 33.6156, lng: 135.9314 }, // 那智勝浦町
    29: { lat: 33.5997, lng: 135.9411 }, // 太地町
    30: { lat: 33.7633, lng: 135.7797 }  // 北山村
};

function initMap() {
    const wakayamaBounds = {
        north: 34.5100,
        south: 33.40000,
        east: 136.3000,
        west: 134.9000
    };
    // カスタムスタイルの定義
    const customMapStyle = [
        {
            featureType: "poi",
            elementType: "labels",
            stylers: [{ visibility: "off" }] // POI ラベルを非表示
        },
        {
            featureType: "transit",
            elementType: "labels",
            stylers: [{ visibility: "off" }] // 公共交通機関のラベルを非表示
        },

        {
            featureType: "landscape",
            elementType: "labels.icon",
            stylers: [{ visibility: "off" }] // 山などを非表示
        },
        {
            featureType: "road",
            elementType: "labels.icon",
            stylers: [{ visibility: "off" }] // 道路アイコンを非表示
        },
    ];

    const map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 34, lng: 135.45 }, // 和歌山を中心に設定
        zoom: 8.5,
        restriction: {
            latLngBounds: wakayamaBounds,
            strictBounds: true, // この設定で制限エリア外の移動を防ぐ
        },
        styles: customMapStyle // カスタムスタイルを適用
    });

    map.addListener("click", (event) => {
        getAddress(event.latLng);
    });
    // 既存の投稿データからマーカーを配置
    fetch('/articles')
        .then(response => response.json())
        .then(data => {
            console.log('Success:');
            data.forEach(article => {
                const location = cityLocations[article.city_id];
                if (location) {
                    const latLng = new google.maps.LatLng(location.lat, location.lng);

                    const marker = new google.maps.Marker({
                        position: latLng,
                        map: map,
                        icon: {
                            url: '/storage/' + article.image_path,
                            scaledSize: new google.maps.Size(50, 50),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(25, 25)
                        }
                    });

                    const infoWindow = new google.maps.InfoWindow({
                        content: `<div><img src="/storage/${article.image_path}" style="width:100px;height:100px;"><p>${article.content}</p></div>`
                    });

                    marker.addListener('click', () => {
                        infoWindow.open(map, marker);
                    });
                }
            });
        })
        .catch(error => console.error('Error fetching articles:', error));

}
// グローバルなmap変数にアクセスできるようにする
window.map = map;


function getAddress(latLng) {
    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ location: latLng }, (results, status) => {
        if (status === "OK" && results[0]) {
            const cityInfo = results[0].address_components.find(component => component.types.includes("locality"));
            const municipality = cityInfo ? cityInfo.long_name : "市町村情報が見つかりませんでした。";
            document.getElementById("location-info").innerText = "市町村: " + municipality;

            if (municipality) {
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

                const cityId = cityIdMap[municipality];

                if (cityId) {
                    // IDが取得できたらリダイレクト
                    window.location.href = `/list/${cityId}`;
                } else {
                    document.getElementById("location-info").innerText = "市町村が見つかりませんでした。";
                }
            }
        } else {
            document.getElementById("location-info").innerText = "位置情報の取得に失敗しました。";
        }
    });
}
