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
                // 市町村名をAPIに送信してIDを取得
                fetch(`/get-city-id?municipality=${encodeURIComponent(municipality)}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.id) {
                            // IDが取得できたらリダイレクト
                            window.location.href = `/list/${data.id}`;
                        } else {
                            document.getElementById("location-info").innerText = "市町村が見つかりませんでした。";
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        document.getElementById("location-info").innerText = "エラーが発生しました。";
                    });
            }
        } else {
            document.getElementById("location-info").innerText = "位置情報の取得に失敗しました。";
        }
    });
}

