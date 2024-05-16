<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//API Category
Route::get('show_category', 'CategoryController@api_show');
Route::post('category', 'CategoryController@api_store');
Route::post('delete_category/{id}', 'CategoryController@api_delete');
Route::post('update_category/{id}', 'CategoryController@api_update');

// Locations
Route::post('location', 'LocationController@api_store');
Route::post('update-location/{id}', 'LocationController@api_update');
Route::delete('delete-location/{id}', 'LocationController@apiDelete');
Route::get('show_location', 'LocationController@api_show');
Route::get('getid_location/{id}', 'LocationController@api_getId');


// Reders
Route::post('reder', 'RederController@apiStore');
Route::post('update-reder/{id}', 'RederController@apiUpdate');
Route::post('update-reder/{id}', 'RederController@apiDelete');
Route::get('reder', 'RederController@apiShow');

//API Banner
Route::get('show_banner', 'BannerController@api_show');
Route::post('banner', 'BannerController@api_store');
Route::post('delete_banner/{id}', 'BannerController@api_delete');
Route::post('update_banner/{id}', 'BannerController@api_update');


// User
Route::put('update-user/{id}', 'UserController@apiUpdate');
Route::post('update-user/{id}', 'UserController@apiDelete');
Route::get('user', 'UserController@apiShow');


// Review
Route::post('review', 'RateController@apiStore');
// Route::delete('update-review/{id}', 'Re@apiDelete');
Route::get('review', 'RateController@apiShow');
Route::get('getuser_review/{id}', 'RateController@getUser_review');
Route::put('update_reply/{id}', 'RateController@apiUpdate');


// Booking
Route::post('booking', 'BookingController@apiStore');
// Route::delete('update-review/{id}', 'Re@apiDelete');
Route::get('booking', 'BookingController@apiShow');
Route::get('getuser_booking/{id}', 'BookingController@getUser_Booking');
Route::post('update_booking/{id}', 'BookingController@apiUpdate');



// Wishlist 
Route::get('wishlist', 'WishlistController@apiShow');
// Oder 
Route::get('oder', 'OderController@apiShow');
//API car
Route::get('dasbroad', 'CarController@api_show');
Route::get('getid_dasbroad/{id}', 'CarController@api_getId');
Route::post('add_dasbroad', 'CarController@api_store');
Route::post('delete_car/{id}', 'CarController@api_delete');
Route::post('update_car/{id}', 'CarController@api_update');


//API comment
Route::get('show_comment', 'CommentController@api_show');
Route::post('comment', 'CommentController@api_store');
Route::post('delete_comment/{id}', 'CommentController@api_delete');

//API history 
Route::get('show_history', 'HistoryController@api_show');
Route::get('getuser_history/{id}', 'HistoryController@getuser_history');
Route::post('history', 'HistoryController@api_store');
Route::post('delete_history/{id}', 'HistoryController@api_delete');


//API contact
Route::get('show_contact', 'ContactController@api_show');
Route::post('contact', 'ContactController@api_store');
// Route::delete('delete_contact/{id}', 'ContactController@api_delete');
// Route::post('update_contact/{id}', 'ContactController@api_update');


//API Sale
Route::get('show_sale', 'SaleController@api_show');
Route::post('sale', 'SaleController@api_store');
Route::delete('delete_sale/{id}', 'SaleController@api_delete');


// District
Route::post('district', 'DistriController@apiStore');
Route::get('getid_district/{id}', 'DistriController@api_getId');
Route::post('update-district/{id}', 'DistriController@apiUpdate');
Route::delete('delete-district/{id}', 'DistriController@apiDelete');
Route::get('district', 'DistriController@apiShow');

