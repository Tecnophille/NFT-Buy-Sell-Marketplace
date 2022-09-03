<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'AuthController@login')->name('login');

Route::get('sign-up', 'AuthController@signUp')->name('sign_up');
Route::post('sign-up-process', 'AuthController@signUpProcess')->name('sign_up_process');
Route::post('login-process', 'AuthController@loginProcess')->name('login_process');
Route::get('forgot-password', 'AuthController@forgotPassword')->name('forgot_password')->middleware('isDemo');
Route::get('verify-email', 'AuthController@verifyEmailPost')->name('verify_web');
Route::get('reset-password', 'AuthController@resetPasswordPage')->name('reset_password_page');
Route::post('send-forgot-mail', 'AuthController@sendForgotMail')->name('send_forgot_mail')->middleware('isDemo');
Route::post('reset-password-save-process', 'AuthController@resetPasswordSave')->name('reset_password_save')->middleware('isDemo');
Route::get('/g2f-checked', 'AuthController@g2fChecked')->name('g2f_checked');
Route::post('/g2f-verify', 'AuthController@g2fVerify')->name('g2f_verify')->middleware('isDemo');
Route::get('seller-profile/{id}', 'AuthController@sellerProfile')->name('seller_profile');
Route::get('change-language', 'LanguageController@changeLanguage')->name('change_language');

Route::get('/discover', 'PageController@discover')->name('discover')->middleware('2fa.auth');
Route::get('/product/view/{id}', 'PageController@productView')->name('product_view');
Route::get('/change-price-to-coin', 'PageController@changePriceToCoin')->name('change_price_to_coin');
Route::get('/how-it-works', 'PageController@howItWorks')->name('how-it-works');
Route::get('/news', 'PageController@news')->name('news');
Route::get('/news-details/{slug}', 'PageController@newsDetails')->name('news_details');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::post('/service-like-store', 'PageController@serviceLikeStore')->name('service_like_store')->middleware('isDemo');
Route::post('/service-like-delete', 'PageController@serviceLikeDelete')->name('service_like_delete')->middleware('isDemo');
Route::get('all-seller', 'SellerController@allSeller')->name('all_seller');
Route::get('filter-service', 'PageController@filterService')->name('filter_service');
Route::get('search-result', 'PageController@searchResult')->name('search_result');
Route::get('search-result-ajax', 'PageController@searchResultAjax')->name('search_result_ajax');

Route::post('subscriber-store', 'CommonController@subscriberStore')->name('subscriber_store')->middleware('isDemo');
Route::post('contact-store', 'CommonController@contactStore')->name('contact_store')->middleware('isDemo');

Route::get('reset-password', 'AuthController@resetPasswordPage')->name('reset_password_page');
Route::get('manual-installed', 'AuthController@manualInstalled')->name('manual_installed');
Route::get('update-version', 'InstallerController@updateVersion')->name('update_version');
Route::post('install-application', 'InstallerController@finalizeInstall')->name('install_application');

Route::post('/2fa', function () {
    return redirect()->route('dashboard');
})->name('2fa')->middleware('2fa');


require base_path('routes/link/admin.php');
require base_path('routes/link/user.php');

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', 'AuthController@logOut')->name('logOut');
});
