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

#Route::get('/', function(){return "<h2 style='color: red;'>Out of service</h2>";});

Route::get('/', 'MainController@getIndex');

Route::get('about', 'MainController@getAbout');
Route::get('services', 'MainController@getServices');
Route::get('credit-cards', 'MainController@getCreditCards');
Route::get('international-banking', 'MainController@getInternational');
Route::get('corporate-businesses', 'MainController@getCorporate');
Route::get('faq', 'MainController@getFAQ');
Route::get('contact', 'MainController@getContact');

Route::get('login', 'LoginController@getLogin');
Route::get('register', 'LoginController@getRegister');
Route::post('login', 'LoginController@postLogin');
Route::post('register', 'LoginController@postRegister');

Route::get('dashboard', 'MainController@getDashboard');
Route::get('add-account', 'MainController@getAddAccount');
Route::post('add-account', 'MainController@postAddAccount');

Route::get('logout', 'LoginController@getLogout');

Route::get('zohoverify/{url}', 'MainController@getZoho');
