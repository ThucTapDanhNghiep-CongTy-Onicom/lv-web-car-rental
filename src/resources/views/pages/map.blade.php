<!DOCTYPE html>
<html>

<head>
    <title>Yotrip</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/ui/css/styles.css') }}">
    <link rel="icon" href="{{ asset('/ui/images/Yotrip_new2.png') }}" type="image/x-icon" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="{{ asset('/ui/js/jquery-3.2.1.min.js') }}"></script>
    <!-- jsFiddle will insert css and js -->

</head>

<body>
    <div class="app-container">
        <div class="sub-page location-selector layout-two">
            <div class="header">
                <div onclick="getBack()">
                    <div>
                        <i class="icon icon-arrow-left pointer"></i>
                    </div>
                </div>

            </div>
            <section class="main">
                <div class="component-map-picker">
                    <div class="map-wrapper">
                        <a href="#address-input" class="dummy-field d-f ai-c jc-c">
                            <div class="icon">
                                <i class="fa fa-search"></i>

                            </div>
                            <span class="f-1" id="resultText">Nhận địa chỉ</span>
                        </a>
                        <div class="map">

                        </div>
                        <div class="get-current-location" onclick="current_position();">
                            <i class="fa fa-crosshairs"></i>
                        </div>
                        <div class="pin d-f ai-c jc-c pe-n">
                            <img src="https://www.zoomcar.com/img/icons/ic_pin.png">
                        </div>
                    </div>
                    <div class="button-wrapper">
                        <div class="button-primary">
                            <span>tiếp tục</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

    {{-- <input id="pac-input" class="controls" type="text" placeholder="Search Box" />
    <div id="map"></div> --}}
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initAutocomplete&libraries=places&v=weekly">
    </script>
    <script type="text/javascript">
        function getBack() {
            history.back();
        }
    </script>
    <script>
        function current_position() {
            // geolocation Object: enableHighAccuracy, timeout, maximumAge 
            //https://developer.mozilla.org/en-US/docs/Web/API/Geolocation/getCurrentPosition
            var options = {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0
            };

            function success(pos) {
                const lat = pos.coords.latitude;
                const long = pos.coords.longitude;
                var value = $('#resultText');
                var requestOptions = {
                    method: 'GET',
                };
                fetch("https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + long +
                        "&key={{ env('GOOGLE_MAPS_API_KEY') }}", requestOptions)
                    .then(
                        response => response.json()
                    )
                    .then((data) => {
                        for (let i = 0; i <= 1; i++) {
                            value.text(data.results[i].formatted_address);
                        }
                    })
                    .catch(
                        error => console.log('error', error)
                    );
            }

            function error(err) {
                //console.warn(`ERROR(${err.code}): ${err.message}`);
                alert(`${err.message}`);
            }
            navigator.geolocation.getCurrentPosition(success, error, options);
        }

        function initAutocomplete() {
            // geolocation Object: enableHighAccuracy, timeout, maximumAge 
            //https://developer.mozilla.org/en-US/docs/Web/API/Geolocation/getCurrentPosition
            var options = {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0
            };

            function success(pos) {
                const lat = pos.coords.latitude;
                const long = pos.coords.longitude;
                var value = $('#resultText');
                var requestOptions = {
                    method: 'GET',
                };
                fetch("https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + long +
                        "&key={{ env('GOOGLE_MAPS_API_KEY') }}", requestOptions)
                    .then(
                        response => response.json()
                    )
                    .then((data) => {
                        for (let i = 0; i <= 1; i++) {
                            value.text(data.results[i].formatted_address);
                        }
                    })
                    .catch(
                        error => console.log('error', error)
                    );
            }

            function error(err) {
                //console.warn(`ERROR(${err.code}): ${err.message}`);
                alert(`${err.message}`);
            }
            navigator.geolocation.getCurrentPosition(success, error, options);
            //TODO: Setup map
            const uluru = {
                lat: 10.8037082,
                lng: 106.74719
            };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.querySelector(".map"), {
                zoom: 13,
                zoomControl: false,
                streetViewControl: false,
                scrollwheel: true,
                disableDefaultUI: true,
                center: uluru,
                mapTypeId: "roadmap",
            });
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: uluru,
                map: map,
            });

        }
    </script>
</body>

</html>
