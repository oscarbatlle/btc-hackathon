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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/interstitial', function () {
    return view('interstitial');
});
Route::get('/thankyou', function () {
    return view('thankyou');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

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
