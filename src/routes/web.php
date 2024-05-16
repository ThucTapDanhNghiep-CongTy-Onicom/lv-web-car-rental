<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\Owner\Mod_Controller;
use App\Http\Controllers\Owner\Cars_Controller;
use App\Http\Controllers\Owner\Renders_Controller;
use App\Http\Controllers\Owner\Region_Controller;
use App\Http\Controllers\Owner\Review_Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
// ----------------------- Home page and other pages for users ----------------- //
Route::get('/' , 'PageController@home')->name('home');
// Car view and car rental section as well as features: details, car area and search
Route::get('/car-rental-list' , 'PageController@cars')->name('car');
Route::get('/car-rental-list/{id}', 'PageController@vehicle_information')->name('car.detail');
Route::get('/filter', 'PageController@filter')->name('sort');
Route::get('/car-rental-list/area/{id}', 'PageController@vehicles_by_region')->name('car.location');
Route::post('/car-rental-list/search-car', 'PageController@search_address')->name('search.car'); // chuẩn bị triển khai google map
// Car selection and booking according to the customer's wishes. 
Route::get('/choose-time/{id}', 'PageController@choose_time')->name('car.booking')->middleware('checkLogin');
Route::post('/payment/{id}', 'PageController@payment_information')->name('car.payment');
Route::post('/payment-book/{id}', 'PageController@payment')->name('car.paymentbook');
// Website developer contact section for customers.
Route::get('/contacts' , 'PageController@contact')->name('contacts');
Route::post('/contact/save', 'PageController@save_contact')->name('contact.save');
// The section to save the cars that customers feel like and order for the next time
Route::get('/wishlist/show', 'PageController@favorite')->name('wishlist')->middleware('checkLogin');
Route::get('/wishlist/add/{id}', 'PageController@add_favorite')->name('wishlist.add')->middleware('checkLogin');
Route::get('/wishlist/remove/{id}', 'PageController@delete_favorite')->name('wishlist.remove');
// The part that displays the promotional code sent to the user by the organizer and has an additional search feature. 
Route::get('/coupon/show' , 'PageController@user_coupon')->name('coupon')->middleware('checkLogin');
Route::get('/coupon/search/key', 'PageController@search_coupon')->name('coupon.search');
// The login feature part applies to social networks: google, facebook,...
Route::get('/auth/google', 'AdminController@redirectToGoogle');
Route::get('/auth/google/callback', 'AdminController@handleGoogleCallback');
Route::get('/getInfo-facebook/{social}', 'SocialController@getInfo');
Route::get('/check-info-facebook/{social}', 'SocialController@checkInfo');
//Page part registration
Route::get('/partner-regis' , 'PartnerRegistration@index')->name('partner.registration');
Route::get('/partner-regis-full' , 'PartnerRegistration@showFull')->name('partner.registration.full');
Route::post('/partner-regis-full' , 'PartnerRegistration@postDataApplication')->name('partner.postDataApplication');

// --------------------- Section for logged in users  ----------------------- //
Route::get('/history/show' , 'PageController@payment_history')->name('history')->middleware('checkLogin');
Route::get('/receipt/show' , 'PageController@user_invoice')->name('receipt')->middleware('checkLogin');
Route::post('/rate', 'RateController@store')->name('rate.add')->middleware('checkLogin');
Route::get('/referral' , 'PageController@user_reffect')->name('referral')->middleware('checkLogin');
// Map: Apply ajax to switch pages without reloading the page.
Route::get('/map' , 'PageController@feature_map');
Route::get('/map/ho-chi-minh' , 'PageController@map');

// --------------------- The lessor part (registration, owner)----------------------- //
//Page part registration
Route::get('/partner-regis' , 'PartnerRegistration@index')->name('partner.registration');
Route::get('/partner-regis-full' , 'PartnerRegistration@showFull')->name('partner.registration.full');
//Profile Owner
Route::get('/profile-owner', 'ProfileOwner@index')->name('profileOwner');

// ------------------------ The last part of the website ----------------------- //
Route::get('/term-and-conditions' , 'PageController@pageTerm')->name('term');
Route::get('/best-price-guarantee' , 'PageController@pageBestPriceGuarantee')->name('bestpriceguarantee');
Route::get('/privacy-cookies-policy' , 'PageController@pagePrivacyCookiesPolicy')->name('privacycookiespolicy');
Route::get('/delivery-time-policy' , 'PageController@pageFaq')->name('faq');
Route::get('/payment-policy' , 'PageController@pagePaymentOption')->name('paymentoption');
Route::get('/policy-to-end-the-trip-early' , 'PageController@pageBookingTips')->name('bookingtips');
Route::get('/price-policy' , 'PageController@pageHowItWorks')->name('howitworks');
Route::get('/flight-cancellation-policy' , 'PageController@pageContactUs')->name('contactus');
Route::get('/owners-guide-rules' , 'PageController@page_guide')->name('guide');
Route::get('/booking-instructions-rules' , 'PageController@page_intruction')->name('intruction');
Route::get('/payment-guide-rules' , 'PageController@page_payment')->name('payment.guide');
Route::get('/general-guidance-rules' , 'PageController@page_general')->name('general.guidance');
Route::get('/register-agent-rules' , 'PageController@page_agent')->name('register.agent');
Route::get('/register-owner-rules' , 'PageController@page_owner')->name('register.owner');
Route::get('/faq-owner-rules' , 'PageController@page_faq_owner')->name('faq.owner');
Route::get('/faq-customer-rules' , 'PageController@page_faq_customer')->name('faq.customer');
Route::get('/about' , 'PageController@pageAbout')->name('about');
Route::get('/service' , 'PageController@pageService')->name('service');



//----------------- Backend (ADMIN) route group start ------------------- //
Route::group(['prefix' => '/', 'middleware' => ['auth']], function () {
    // Exclusive section for admins and car hirers
    Route::get('/404' , 'AdminController@error')->middleware('checkRole:admin');
    Route::get('/admin' , 'AdminController@admin')->name('admin')->middleware('checkRole:admin');
    Route::get('/settings' , 'AdminController@setting')->middleware('checkRole:admin');
    Route::get('/create-setting' , 'AdminController@createSetting')->name('create.setting')->middleware('checkRole:admin');
    Route::post('/store-setting' , 'AdminController@storeSetting')->name('store.setting');
    Route::get('/delete-setting/{id}' , 'AdminController@deleteSetting')->name('delete.setting');
    Route::get('/profile/{id}', 'AdminController@profile')->name('admin.profile');

    // Phần dành cho người quản trị mà không dành cho người cho thuê xe.
    Route::resource('user' , 'UserController')->middleware('checkRole:admin');
    Route::resource('reder' , 'RederController')->middleware('checkRole:admin');
    Route::resource('category' , 'CategoryController')->middleware('checkRole:admin');
    Route::resource('banner' , 'BannerController')->middleware('checkRole:admin');
    Route::resource('contact', 'ContactController')->middleware('checkRole:admin');
    Route::resource('sale', 'SaleController')->middleware('checkRole:admin');
    Route::resource('wishlist' , 'WishlistController')->middleware('checkRole:admin');
    
    // Phần dành cho cả 2: là người quản trị và người cho thuê xe.
    Route::resource('main-content', 'CarController')->middleware('checkRole:admin'); // Post your car on the website.
    Route::resource('location' , 'LocationController')->middleware('checkRole:admin');
    Route::resource('review' , 'RateController')->middleware('checkRole:admin');
    Route::resource('booking' , 'BookingController')->middleware('checkRole:admin');
    Route::resource('oder' , 'OderController')->middleware('checkRole:admin');
    Route::resource('comment', 'CommentController')->middleware('checkRole:admin');
    Route::resource('history', 'HistoryController')->middleware('checkRole:admin');
    Route::resource('district', 'DistriController')->middleware('checkRole:admin');
 
});
//---------------------Backend (MOD) route group start---------------------
Route::group(['prefix' => '/vn', 'middleware' => ['auth']], function () {
    Route::get('/bang-dieu-khien', [Mod_Controller::class , 'index'])->middleware('checkRole:mod');
    Route::group(['prefix' => '/dang-xe-cua-ban'], function () {
        Route::get('/', [Cars_Controller::class , 'index'])->name('index')->middleware('checkRole:mod');
        Route::get('/filter', [Cars_Controller::class , 'filterRegion'])->name('region.ajax')->middleware('checkRole:mod');
        Route::get('/trash', [Cars_Controller::class , 'trash'])->name('trash.index')->middleware('checkRole:mod');
        Route::get('/create', [Cars_Controller::class , 'create'])->name('create')->middleware('checkRole:mod');
        Route::get('/edit/{id}', [Cars_Controller::class , 'edit'])->name('edit')->middleware('checkRole:mod');
        Route::post('/insert', [Cars_Controller::class , 'store'])->name('store')->middleware('checkRole:mod');
        Route::post('/update/{id}', [Cars_Controller::class , 'update'])->name('update')->middleware('checkRole:mod');
        Route::post('/delete/{id}', [Cars_Controller::class , 'destroy'])->name('destroy')->middleware('checkRole:mod');
        Route::post('/trash/{id}', [Cars_Controller::class , 'moveTrash'])->name('trash.move')->middleware('checkRole:mod');
        Route::post('/rehibilitate/{id}', [Cars_Controller::class , 'rehibilitate'])->name('trash.rehibilitate')->middleware('checkRole:mod');
    });
    Route::group(['prefix' => '/hang-xe'], function () {
        Route::get('/', [Renders_Controller::class , 'index'])->name('renders.index')->middleware('checkRole:mod');
    });
    Route::group(['prefix' => '/khu-vuc'], function () {
        Route::get('/', [Region_Controller::class , 'index'])->name('place.index')->middleware('checkRole:mod');
    });
    Route::group(['prefix' => '/danh-gia-cua-khach-hang'], function () {
        Route::get('/', [Review_Controller::class , 'index'])->name('review.index')->middleware('checkRole:mod');
    });
});
//--------------------End backend route group---------------------
//---------------------User route group start---------------------
Route::group(['prefix' => '/ui'], function () {
    // Account registration part: apply OTP code to email.
    Route::post('/otp', 'PageController@user_submit_otp')->name('registerotp');
    Route::get('/register', 'PageController@user_register')->name('user.register');
    Route::post('/register', 'PageController@user_register_submit')->name('user.register.submit');
    // User login and logout section.
    Route::get('/login', 'PageController@user_login')->name('user.login');
    Route::post('/login', 'PageController@user_login_submit')->name('user.login.submit');
    Route::get('/logout', 'PageController@user_logout')->name('user.logout');
    // The user information section, edit information and change the user's password.
    Route::get('/profile/{id}', 'PageController@user_information');
    Route::get('/account/{id}', 'PageController@user_profile')->name('user.profile');
    Route::patch('edit-profile/{id}','UserController@editUser')->name('editUser');
    Route::get('/changepassword', 'PageController@user_change_password')->name('user.change.password');
    Route::post('/changepassword/save', 'UserController@changPasswordStore')->name('user.changepass.save');
    // The program introduces, next time develops more information sharing on MXH.
    Route::get('/register/ref/{ref}', 'PageController@user_register_ref')->name('user.register.ref');

    // Online payment section with sandbox test environment
    Route::post('payment/online/{id}','PageController@create_payment')->name('payment.online');
    Route::get('payment/return','PageController@vnpay_return')->name('vnpay.return');

   
    
});
