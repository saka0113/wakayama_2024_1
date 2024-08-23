function initMap() {
    const wakayamaBounds = {
        north: 34.5100,
        south: 33.40000,
        east: 136.3000,
        west: 134.9000
    };
const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 34, lng: 135.45 }, // 東京を中心に設定
    zoom: 8.5,
    restriction: {
        latLngBounds: wakayamaBounds,
        strictBounds: true, // この設定で制限エリア外の移動を防ぐ
    },
    
});

map.addListener("click", (event) => {
    getAddress(event.latLng);
});
}

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

