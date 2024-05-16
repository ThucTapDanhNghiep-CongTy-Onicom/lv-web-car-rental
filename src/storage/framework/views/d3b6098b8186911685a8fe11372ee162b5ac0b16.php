<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>

    <title>Yotrip</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/open-iconic-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/animate.css')); ?>">
    <!-- or the reference on CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- themify icon -->
    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/css/themify-icons.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/magnific-popup.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/aos.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/ionicons.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/jquery.timepicker.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/icomoon.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/partner.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/loader.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/ani-car.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/ui/css/styles.css')); ?>">

    <link rel="icon" href="<?php echo e(asset('public/ui/images/Yotrip_new2.png')); ?>" type="image/x-icon" />
    <?php echo $__env->yieldPushContent('styles'); ?>
    <script src="<?php echo e(asset('public/ui/js/jquery-3.2.1.min.js')); ?>"></script>

</head>
<?php
$temp = asset('');
session_start();

?>

<body>
    <!-- Overlay -->

    <div class="overlay" id="overlay">
        <!-- Popup -->
        <div class="popup" id="popup">
            <div class="popup-inner">
                <div class="s3-btn-closes" onclick="popupClose();"> <i class="icon icon-arrow-lefts pointer"></i></div>
                <div class="popup_content">
                    <div class="banner_location inline_top">
                        <img src="<?php echo e(asset('public/ui/images/Group.svg')); ?>" alt="Logo">
                    </div>
                    <div class="inner_location inline_top">
                        <form id="submitform2" method="GET" class="form-group light_circle" action="<?php echo e(url('/')); ?>">
                            <div class="fa_light_circle"></div>
                            <input id="addressId" type="text" name="address" placeholder="Chọn điểm xuất phát của bạn">
                           
                            
                        </form>
                    </div>
                    <div class="group-location inline_top" onclick="locate();">
                        <div id="location_currency" class="group-location_item location_currency">
                            <i class="fa fa-map-marker"></i>
                            <div id="posStatus" style="display: contents;">Vị
                                trí hiện tại</div>
                            <!-- <div>
                                <div>Latitude: <span id="lat"></span></div>
                                <div>Longitude: <span id="lon"></span></div>
                            </div> -->
                        </div>
                        <div class="group-location_item location_map" onclick="location.href='/map/ho-chi-minh'">
                            <i class="fa fa-child"></i>
                            Chọn vị trí trên bản đồ
                        </div>
                    </div>

                    <form method="get" id="submitform">
                        <div class="button-wrapper">
                            <input id="hidden_address" type="hidden" name="address">
                            <button type="submit" class="button-primary" style="max-width: 550px">
                                <span>Pick Location</span>
                            </button>
                        </div>
                    </form>
                    <div class="ani_car">
                        <div class="car">
                            <div class="car__top"></div>
                            <div class="car__body">
                                <div class="car__bulb"></div>
                                <div class="car__bulb car__bulb--back"></div>
                                <div class="car__center"></div>
                            </div>
                            <div class="car__wheels">
                                <div class="car__wheel car__wheel--1">
                                    <div class="wheel__circle"></div>
                                    <div class="wheel__rect wheel__rect--1"></div>
                                    <div class="wheel__rect wheel__rect--2"></div>
                                    <div class="wheel__rect wheel__rect--3"></div>
                                    <div class="wheel__rect wheel__rect--4"></div>
                                    <div class="wheel__rect wheel__rect--5"></div>
                                    <div class="wheel__rect wheel__rect--6"></div>
                                </div>
                                <div class="car__wheel car__wheel--2">
                                    <div class="wheel__circle"></div>
                                    <div class="wheel__rect wheel__rect--1"></div>
                                    <div class="wheel__rect wheel__rect--2"></div>
                                    <div class="wheel__rect wheel__rect--3"></div>
                                    <div class="wheel__rect wheel__rect--4"></div>
                                    <div class="wheel__rect wheel__rect--5"></div>
                                    <div class="wheel__rect wheel__rect--6"></div>
                                </div>
                            </div>
                        </div>

                        <div class="cloud" style="--delay:1s;--top:10vmin"></div>
                        <div class="cloud" style="--delay:3s;--top:20vmin"></div>
                        <div class="cloud" style="--delay:7s;--top:10vmin"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">

                    <img style="width: 100px;" src="<?php echo e(asset('public/ui/images/Yotrip_logo-website-01.png')); ?>"
                        alt="Header Avatar">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item 
                        <?php
                        if (Session::get('home') == 'active') {
                            echo 'active';
                        } else {
                            echo '';
                        }
                        ?>"><a href="<?php echo e(url('/')); ?>"
                                class="nav-link" data-i18n="header.home"></a></li>
                        <!-- <li class="nav-item"><a href="<?php echo e(route('about')); ?>" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="<?php echo e(route('service')); ?>" class="nav-link">Services</a></li> -->
                        <!-- <li class="nav-item"><a href="pricing.html" class="nav-link">Pricing</a></li> -->
                        <li class="nav-item a                        
                        <?php
                        if (Session::get('vehicle') == 'active') {
                            echo 'active';
                        } else {
                            echo '';
                        }
                        ?>"><a
                                href="<?php echo e(route('car')); ?>" class="nav-link" data-i18n="header.vehicle"></a>
                        </li>
                        <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
                        <li class="nav-item                         
                        <?php
                        if (Session::get('contact') == 'active') {
                            echo 'active';
                        } else {
                            echo '';
                        }
                        ?>"><a
                                href="<?php echo e(route('contacts')); ?>" class="nav-link" data-i18n="header.contact"></a>
                        </li>
                        <li class="nav-item dropdown" id="parent-drop">
                            <div class="dropdown-toggle nav-link" role="button" id="language"> English</div>
                            <div class="dropdown-menu" aria-labelledby="language" id="child-drop">
                                <ul class="lang-picker">
                                    <li class="dropdown-item" id="portuguese"
                                        onclick="document.querySelector('#language').textContent='Português'">português
                                    </li>
                                    <li class="dropdown-item" id="english"
                                        onclick="document.querySelector('#language').textContent='English'">English</li>
                                    <li class="dropdown-item" id="vietnamese"
                                        onclick="document.querySelector('#language').textContent='Vietnamese'">
                                        Vietnamese</li>
                                </ul>
                            </div>
                            <div id="google_translate_element2"></div>
                        </li>
                        <?php if(Auth::user()): ?>

                            <li class="nav-item dropdown d-flex" id="showUser">
                                <?php if(Auth()->user()->social_type == 'google'): ?>
                                    <img style="width: 36px;height: 36px;margin-right: 10px;border-radius: 50%;margin-top: 12px;"
                                        class="img-fluid" src="<?php echo e(Auth()->user()->photo); ?>" alt="Header Avatar">
                                <?php else: ?>
                                    <?php if(Auth()->user()->photo): ?>
                                        <img style="width: 36px;height: 36px;margin-right: 10px;border-radius: 50%;margin-top: 12px;"
                                            class="img-fluid" src="<?php echo e(Auth()->user()->photo); ?>"
                                            alt="Header Avatar">
                                    <?php else: ?>
                                        <img style="width: 36px;height: 36px;margin-right: 10px;border-radius: 50%;margin-top: 12px;"
                                            class="img-fluid"
                                            src="<?php echo e(asset('public/backend/assets/images/users/user-1.jpg')); ?>"
                                            alt="Header Avatar">
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="dropdown-toggle nav-link" style="padding-left: 0px !important;"
                                    role="button" id="more"><?php echo e(Auth::user()->name); ?></div>
                                <div class="dropdown-menu" aria-labelledby="more" id="showUser2"
                                    style="position: absolute !important;">
                                    <!-- Quản trị viên -->
                                    <?php if(auth()->guard()->check()): ?>
                                        <?php if(Auth::user()->role == 'admin'): ?>
                                            <a class="dropdown-item" href="<?php echo e(route('admin')); ?>">Administrators</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <!-- Người cho thuê xe -->
                                    <?php if(Auth::user()->role == 'mod'): ?>
                                        <a class="dropdown-item"
                                            href="<?php echo e(url('/vn/bang-dieu-khien')); ?>">Dashboard</a>
                                    <?php endif; ?>
                                    <!-- Kết thúc -->
                                    <?php
                                        $encode = encrypt(Auth::user()->id);
                                    ?>
                                    <a class="dropdown-item" href="<?php echo e(route('user.profile', $encode)); ?>">Account</a>
                                    <?php if(Auth::user()->id): ?>
                                        <a class="dropdown-item" href="<?php echo e(route('wishlist')); ?>">Favorite</a>
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="<?php echo e(route('coupon')); ?>">Coupons</a>
                                    <a class="dropdown-item" href="<?php echo e(route('history')); ?>">Historys</a>
                                    <?php if(Auth::user()->role == 'user' || Auth::user()->role == 'mod'): ?>
                                        <a class="dropdown-item" href="<?php echo e(route('referral')); ?>">Invite friends</a>
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="<?php echo e(route('user.change.password')); ?>">Change
                                        Password</a>
                                    <a class="dropdown-item" href="<?php echo e(route('user.logout')); ?>">Logout</a>
                                </div>

                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('user.login')); ?>" class="nav-link btn"
                                    data-i18n="header.signIn"></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('user.register')); ?>" class="nav-link btn btn-outline-white"
                                    data-i18n="header.signUp"></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
   
    <script type="text/javascript">
        $('#submitform').on('submit', function(e) {
            // e.preventDefault(); không chuyển đổi trang

            let address = $('#hidden_address').val();
            $.ajax({
                url: "/",
                type: "GET",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    address: address,
                },
                success: function(response) {
                    let res = $('#res').val();
                    //console.log(res);
                },
                error: function(response) {

                },
            });
        });
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAPS_API_KEY')); ?>&callback=initAutocomplete&libraries=places&v=weekly"
        async></script>
    <script>
        const body = document.querySelector('body')
        document.addEventListener('scroll', () => {
            setLogo('<?php echo e($temp); ?>')
        })
        //Searching for places: google map suggestion type
        function initAutocomplete() {
            // Create the search box and link it to the UI element.
            const input = document.getElementById("addressId");
            const searchBox = new google.maps.places.SearchBox(input);
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();

                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    // Location icon when searching (adjust this)
                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };
                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                // map.fitBounds(bounds);
            });
        }
        //Client's current location
        function locate() {
            const posStatus = document.querySelector('#posStatus');
            //const locInfo = document.querySelector('#locInfo'); 
            setInterval(function() {
                posStatus.innerHTML = 'Vị trí hiện tại'
            }, 1000);
            var interval_obj = setInterval(function() {
                posStatus.innerHTML = 'Đang lấy vị trí...'
                clearInterval(interval_obj);
            }, 200);
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
                var value = $('#addressId');
                var input = $('#hidden_address');
                var requestOptions = {
                    method: 'GET',
                };
                fetch("https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + long +
                        "&key=<?php echo e(env('GOOGLE_MAPS_API_KEY')); ?>", requestOptions)
                    .then(
                        response => response.json()
                    )
                    .then((data) => {
                        for (let i = 0; i <= 1; i++) {
                            value.val(data.results[i].formatted_address);
                            input.val(data.results[i].formatted_address);
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

        function setLogo(href) {
            const activeHeader = document.querySelector('#ftco-navbar.ftco-navbar-light.scrolled .navbar-brand img')
            const disactiveHeader = document.querySelector('#ftco-navbar.ftco-navbar-light .navbar-brand img')
            let url1 = href + "public/ui/images/Yotrip_logo-website-01.png"
            let url2 = href + "public/ui/images/Group.svg"
            if (activeHeader) {
                activeHeader.setAttribute('src', url2)
            } else if (disactiveHeader) {
                disactiveHeader.setAttribute('src', url1)
            }
        }
        //Set display when write in din input
        function openLocation() {
            document.querySelector('.popup .inner_location .light_circle .option_location').style.display = 'block'
        }
        //Get value of option location when click in this
        function chooseOptionLocation() {
            const parentOption = document.querySelector('.popup .inner_location .light_circle .option_location')
            const valueInput = document.querySelector('.popup .inner_location .light_circle #addressId')
            const option = document.querySelectorAll(
                '.popup .inner_location .light_circle .option_location .group_op .info_location')
            option.forEach((e) => {
                e.addEventListener('click', () => {
                    parentOption.style.display = 'none'
                    valueInput.value = e.textContent
                })
            })
        }
        chooseOptionLocation()
    </script>
    <script>
        //Show button dropdown of user when clicked
        const toggleShowUser = document.querySelector('#showUser')
        const dropShowUser = document.querySelector('#showUser2')
        //Show button dropdown of translate language when clicked
        const language = document.querySelector('#language')
        const parentLanguage = document.querySelector('#parent-drop')
        const childLanguage = document.querySelector('#child-drop')
        language.addEventListener('click', () => { //Add event clicked for button change language
            parentLanguage.classList.toggle('show')
            childLanguage.classList.toggle('show')
        })
        if (toggleShowUser) {
            toggleShowUser.addEventListener('click', () => { //Add event clicked for button function user
                toggleShowUser.classList.toggle('show')
                dropShowUser.classList.toggle('show')
            })
        }
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Yotrip\resources\views/layouts/app.blade.php ENDPATH**/ ?>