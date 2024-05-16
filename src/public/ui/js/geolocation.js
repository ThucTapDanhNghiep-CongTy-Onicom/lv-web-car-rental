const MAPBOX_API_TOKEN = 'pk.eyJ1Ijoic3B1dG5pay1idW50cGxhbmV0IiwiYSI6ImNqcnVlc2JsYzByMnMzeXRjdzd1bXFlYTAifQ.n2S5gMsjFAOfJ5EAsBvFng';
//Randers, Central Denmark, Denmark
$(document).ready(() => {
    $("#location_currency").on("click", getLocation);

    function getLocation() {
        $.getJSON("https://ipinfo.io/", reverseGeocoding);
    }

    //Function get and print latitude-longitude in screen
    function onLocationGot(info) {
        let position = info.loc.split(",");
        $("#lat").text(position[0]);
        $("#lon").text(position[1]);
    }

    /*
    ** Get currency position of user by geolocation
    ** Only support in https
    */
    var x = document.getElementById("demo");
    function getLocationGeo() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPositionGeo);
        } else {
            x.innerHTML = "Geolocation không được hỗ trợ bởi trình duyệt này.";
        }
    }
    function showPositionGeo(position) {
        x.innerHTML = "Vĩ độ: " + position.coords.latitude +
            "<br>Kinh độ: " + position.coords.longitude;
    }
});

//Show currency position of user in map
function showPosition(positions) {
    let position = positions.loc.split(",");
    let lat = position[0];
    let lon = position[1];
    let latlon = new google.maps.LatLng(lat, lon)
    const mapholder = document.getElementById('mapholder')
    mapholder.style.height = '500px';
    mapholder.style.width = '700px';

    let myOptions = {
        center: latlon, zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        navigationControlOptions: { style: google.maps.NavigationControlStyle.SMALL }
    }
    let map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
    let marker = new google.maps.Marker({ position: latlon, map: map, title: "You are here!" });
}
//Get address currency position of user
function reverseGeocoding(positions) {
    let position = positions.loc.split(",");
    let latitude = position[0];
    let longitude = position[1];
    // alert('asdas ' + latitude)
    reverseExternalGeocoding(longitude, latitude, 'vi').then(data => {
        data.json().then(json => {
            const elAddress = document.querySelector('#addressId');
            elAddress.value = `${json.features[0].place_name}`;

        }).catch(e => console.error(e));
    }).catch(e => console.error(e));
}
function reverseExternalGeocoding(lng, lat, lang) {
    let url = `https://api.mapbox.com/geocoding/v5/mapbox.places/${lng},${lat}.json?access_token=${MAPBOX_API_TOKEN}&language=${lang}`;
    return fetch(url, { mode: 'cors' })
}
