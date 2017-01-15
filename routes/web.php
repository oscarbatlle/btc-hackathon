<?php

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
Route::get('/', 'DashboardController@index');

Route::get('/claim/{affiliate_id}/{campaign_id}', 'ClaimController@index');

Route::get('/interstitial', function () {
    return view('interstitial');
});

Route::get('sendmoney', 'CoinBaseController@sendTransaction');

Route::get('/thankyou/{hash}', 'ClaimController@thankyou');

/*
|--------------------------------------------------------------------------
| Tracking routes
|--------------------------------------------------------------------------
*/
Route::get('/track', 'TrackingController@track');
Route::get('/reward', 'TrackingController@reward');

/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| Home routes
|--------------------------------------------------------------------------
*/
Route::get('/home', 'HomeController@index');

//Route::get('/alexa/wallet/{id}', 'HomeController@grab_wallet');

Route::get('/test', 'TrackingController@test');


/*
|--------------------------------------------------------------------------
| Affiliates routes
|--------------------------------------------------------------------------
*/
Route::resource('/affiliates', 'AffiliateController');

/*
|--------------------------------------------------------------------------
| Campaigns routes
|--------------------------------------------------------------------------
*/
Route::resource('/campaigns', 'CampaignController');

/*
|--------------------------------------------------------------------------
| Coinbase routes
|--------------------------------------------------------------------------
*/
