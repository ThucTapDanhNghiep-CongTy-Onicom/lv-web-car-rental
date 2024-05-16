<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(['module' => 'API_V1', 'middleware' => 'api', 'namespace' => "App\Modules\API_V1\Controllers"], function () {

    Route::group(["prefix" => "api/v1"], function () {
    
        /* Public route */
        //Users
        Route::post("users/login", ["as" => "api.users.login", "uses" => "Users@login"]);
        Route::get('users/auth',["as" => "api.users.error", "uses" => "Users@error"]);
        Route::post("users/otp", ["as" => "api.users.create", "uses" => "Users@create"]);
        Route::post("users/create", ["as" => "api.users.register", "uses" => "Users@register"]);
        Route::post("users/social", ["as" => "api.users.social", "uses" => "Users@social"]);
        Route::post("users/forgot/password", ["as" => "api.users.forgotPassword_SendMail", "uses" => "Users@forgotPassword_SendMail"]);
        
        /* Protected route */
        Route::group(["middleware" => ["auth:sanctum"]], function () {
            //Users
            Route::group(["prefix" => "users"], function () {
                Route::post("/", ["as" => "api.users.index", "uses" => "Users@index"]);
                Route::post("/find", ["as" => "api.users.findUsers", "uses" => "Users@findUsers"]);
                Route::post("/profile", ["as" => "api.users.profile", "uses" => "Users@profile"]);
                Route::post("logout", ["as" => "api.users.logout", "uses" => "Users@logout"]);
                Route::post("/change/password", ["as" => "api.users.changePassword", "uses" => "Users@changePassword"]);
                Route::post("/upload/profile", ["as" => "api.users.updateProfile", "uses" => "Users@updateProfile"]);
                Route::post("/upload/phone", ["as" => "api.users.updatePhone", "uses" => "Users@updatePhone"]);
                Route::post("/upload/image", ["as" => "api.users.updatePhoto", "uses" => "Users@updatePhoto"]);
                //My Booking: Customer transaction history
                Route::post("/my-booking", ["as" => "api.booking.my_booking", "uses" => "Booking@my_booking"]);
                //Orders: /orders
                Route::post("/orders", ["as" => "api.booking.index", "uses" => "Booking@booking_car_information"]); 
                //Whishlist:
                Route::post("/favorite", ["as" => "api.whishlist.favorite", "uses" => "Whishlist@favorite"]);
                Route::post("/check-favorite", ["as" => "api.users.detail_favorite", "uses" => "Users@detail_favorite"]);
                Route::post("/add-delete-favorite", ["as" => "api.whishlist.add_delete_favorite", "uses" => "Whishlist@add_delete_favorite"]); 

                //Location search history: /history-places
                Route::post("/history-places", ["as" => "api.users.places", "uses" => "Users@places"]);
                Route::post("/history-places/save", ["as" => "api.users.save_place", "uses" => "Users@save_place"]);
                Route::post("/history-places/delete", ["as" => "api.users.delete_place", "uses" => "Users@delete_place"]);
            });
        });
          
        //Settings: http:://yotrip.vn/api/v1/config
        Route::group(["prefix" => "config"], function() {
            Route::get("/", ["as" => "api.config.index", "uses" => "Config@index"]);
            Route::get("/about-us", ["as" => "api.config.about", "uses" => "Config@about"]);
            Route::get("/thinks", ["as" => "api.config.thinks", "uses" => "Config@thinks"]);
        });  
        //Banners: http:://yotrip.vn/api/v1/banners
        Route::group(["prefix" => "banners"], function() {
            Route::get("/", ["as" => "api.banners.index", "uses" => "Banners@index"]);
            Route::get("/mobile",["as" => "api.banners.mobile","uses" => "Banners@mobile"]);
        });
        //Cars: http:://yotrip.vn/api/v1/cars
        Route::group(["prefix" => "cars"], function() {
            Route::get("/", ["as" => "api.cars.index", "uses" => "Cars@index"]); /* http:://yotrip.vn/api/v1/cars */
            Route::get("/drive", ["as" => "api.cars.drive", "uses" => "Cars@drive"]);  /* http:://yotrip.vn/api/v1/cars/drive */
            Route::get("/seat", ["as" => "api.cars.seat", "uses" => "Cars@seat"]); /* http:://yotrip.vn/api/v1/cars/seat */
            Route::get("/driving", ["as" => "api.cars.driving", "uses" => "Cars@driving"]); /* http:://yotrip.vn/api/v1/cars/driving */
            Route::get("/lastest", ["as" => "api.cars.lastest", "uses" => "Cars@lastest"]);
            Route::get("/filter", ["as" => "api.cars.filter", "uses" => "Cars@filter"]);
            Route::get("/discount", ["as" => "api.cars.discount", "uses" => "Cars@discount"]);
            Route::get("/brand", ["as" => "api.cars.brand", "uses" => "Cars@brand"]);
            Route::get("/top-locations", ["as" => "api.cars.top_locations", "uses" => "Cars@top_locations"]);
            Route::get("/top-renders", ["as" => "api.cars.top_renders", "uses" => "Cars@top_renders"]);
            Route::get("/top-booking", ["as" => "api.cars.top_booking", "uses" => "Cars@top_booking"]);
            Route::get("/research-location", ["as" => "api.cars.research_location", "uses" => "Cars@research_location"]);
            Route::get("/detail", ["as" => "api.cars.detail", "uses" => "Cars@detail"]);
            Route::get("/renders", ["as" => "api.cars.renders", "uses" => "Cars@renders"]); /* http:://yotrip.vn/api/v1/cars/detail/id */
            Route::get("/location", ["as" => "api.cars.location", "uses" => "Cars@location"]); /* http:://yotrip.vn/api/v1/cars/location/id */
            Route::get("/booking", ["as" => "api.cars.booking", "uses" => "Cars@booking"]); /* http:://yotrip.vn/api/v1/cars/booking/id */
        });
        
        //Coupon: http:://yotrip.vn/api/v1/coupons
        Route::group(["prefix" => "coupons"], function() {
            Route::get("/", ["as" => "api.coupon.index", "uses" => "Coupon@index"]); /* http:://yotrip.vn/api/v1/coupons */
            Route::get("/detail/{id}", ["as" => "api.coupon.detail", "uses" => "Coupon@detail"]); /* http:://yotrip.vn/api/v1/detail/id */
            Route::get("/search", ["as" => "api.coupon.search", "uses" => "Coupon@search"]); /* http:://yotrip.vn/api/v1/coupons/search */
        });
        //Location: http:://yotrip.vn/api/v1/locations
        Route::group(["prefix" => "locations"], function() {
            Route::get("/", ["as" => "api.locations.index", "uses" => "Locations@index"]); /* http:://yotrip.vn/api/v1/locations */
            Route::get("/for", ["as" => "api.locations.booking_for_location", "uses" => "Locations@booking_for_location"]); /* http:://yotrip.vn/api/v1/locations/for */
            Route::get("/district", ["as" => "api.locations.district", "uses" => "Locations@district"]);
        });
        //Renders: http:://yotrip.vn/api/v1/renders
        Route::group(["prefix" => "renders"], function() {
            Route::get("/", ["as" => "api.renders.index", "uses" => "Renders@index"]);
            Route::get("/list", ["as" => "api.renders.list_renders", "uses" => "Renders@list_renders"]);
        });
        //Review: http:://yotrip.vn/api/v1/reviews
        Route::group(["prefix" => "reviews"], function() {
            Route::get("/", ["as" => "api.reviews.index", "uses" => "Reviews@index"]);
            Route::get("/average/{id}", ["as" => "api.reviews.average", "uses" => "Reviews@average"]);
        });
        //Chart: http:://yotrip.vn/api/v1/admin
        Route::group(["prefix" => "admin"], function () {
            Route::get("/statistical", ["as" => "api.admin.statistical", "uses" => "Admin@statistical"]);
            Route::get("/revenue", ["as" => "api.admin.revenue", "uses" => "Admin@revenue"]);
        });
        /*
        Route::post("login-token", ["as" => "api.admin.login", "uses" => "Admin@login"]);
        Route::post("register-admin", ["as" => "api.admin.register", "uses" => "Admin@register"]);

        //Route::middleware('auth:api')->group(function () {

        Route::group(["prefix" => "nft"], function () {
            Route::post("/create", ["as" => "api.nft.create", "uses" => "Nft@create"]);
        });

        Route::group(["prefix" => "users"], function () {
            Route::post("/create", ["as" => "api.users.create", "uses" => "Users@create"]);
        });

        Route::get("test", ["as" => "api.test.index", "uses" => "Test@index"]);
        Route::group(["prefix" => "config"], function () {
            Route::get("/", ["as" => "api.config.index", "uses" => "Config@index"]);
        });
        Route::group(["prefix" => "privacy"], function () {
            Route::get("/", ["as" => "api.config.privacy", "uses" => "Config@privacy"]);
        });
        Route::get("aboutus/{language}", ["as" => "api.config.aboutus", "uses" => "Config@aboutus"]);
        Route::get("visa/{language}", ["as" => "api.config.visa", "uses" => "Config@visa"]);
        Route::get("safety/{language}", ["as" => "api.config.visa", "uses" => "Config@safety"]);
        Route::get("emergency/{language}", ["as" => "api.config.emergency", "uses" => "Config@emergency"]);
        Route::get("embassy/{language}", ["as" => "api.config.embassy", "uses" => "Config@embassy"]);

        //for welcome
        Route::group(["prefix" => "welcome"], function () {
            Route::get("/", ["as" => "api.welcome.index", "uses" => "Welcome@index"]);
            Route::get("/test-mail", ["as" => "api.welcome.test", "uses" => "Welcome@test"]);
        });
        //for users
        Route::group(["prefix" => "users"], function () {
            Route::post("register", ["as" => "api.users.register", "uses" => "Users@register"]);
            Route::post("login", ["as" => "api.users.login", "uses" => "Users@login"]);
            Route::post("info", ["as" => "api.users.info", "uses" => "Users@info"]);
            Route::post("update-profile", ["as" => "api.users.updateProfile", "uses" => "Users@updateProfile"]);
            Route::post("update-photo", ["as" => "api.users.updatePhoto", "uses" => "Users@updatePhoto"]);
            Route::post("forgotpassword-sendmail", ["as" => "api.users.forgotPassword_SendMail", "uses" => "Users@forgotPassword_SendMail"]);
            Route::post("forgotpassword-checkcode", ["as" => "api.users.forgotPassword_checkcode", "uses" => "Users@forgotPassword_checkcode"]);
            Route::post("change-password", ["as" => "api.users.changePassword", "uses" => "Users@changePassword"]);
            Route::get("find", ["as" => "api.users.findUsers", "uses" => "Users@findUsers"]);
        });
        //for slider
        Route::group(["prefix" => "sliders"], function () {
            Route::get("/{language}", ["as" => "api.sliders.index", "uses" => "Sliders@index"]);
        });
        //for category
        Route::group(["prefix" => "category"], function () {
            Route::get("/{language}", ["as" => "api.category.index", "uses" => "Category@index"]);
            Route::get("/all/{language}", ["as" => "api.category.allCategory", "uses" => "Category@allCategory"]);
        });
        //for news
        Route::group(["prefix" => "news"], function () {
            Route::get("/{language}/{limit?}", ["as" => "api.news.index", "uses" => "News@index"]);
            Route::get("/detail/{language}/{id}", ["as" => "api.news.detail", "uses" => "News@detail"]);
        });
        //for ask
        Route::group(["prefix" => "ask"], function () {
            Route::get("/", ["as" => "api.ask.index", "uses" => "Ask@index"]);
            Route::post("/create", ["as" => "api.ask.create", "uses" => "Ask@create"]);
        });
        //for post
        Route::group(["prefix" => "post"], function () {
            Route::get("/{language}", ["as" => "api.post.index", "uses" => "Post@index"]);
            Route::get("/allpost/{language}", ["as" => "api.post.allpost", "uses" => "Post@allpost"]);
            Route::get("/detail/{language}", ["as" => "api.post.detail", "uses" => "Post@detail"]);
            Route::get("/topplaces/{language}", ["as" => "api.post.topplace", "uses" => "Post@topplaces"]);
            Route::get("/toppopular/{language}", ["as" => "api.post.toppopular", "uses" => "Post@toppopular"]);
        });

        //for gallery
        Route::group(["prefix" => "gallery"], function () {
            Route::get("/{language}", ["as" => "api.gallery.index", "uses" => "Gallery@index"]);
            Route::get("/detail/{language}", ["as" => "api.gallery.detail", "uses" => "Gallery@detail"]);
        });
        Route::group(["prefix" => "tips"], function () {
            Route::get("/", ["as" => "api.tips.index", "uses" => "Tips@index"]);
            Route::get("/detail", ["as" => "api.tips.detail", "uses" => "Tips@detail"]);
        });
        Route::group(["prefix" => "search"], function () {
            Route::get("/{language}", ["as" => "api.serch.index", "uses" => "Search@index"]);
        });
        //});
        */
    });
});