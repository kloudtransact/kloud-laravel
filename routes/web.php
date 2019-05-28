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
Route::get('bundle', 'MainController@getBundle');
Route::get('auction', 'MainController@getAuction');
Route::get('top-deals', 'MainController@getTopDeals');
Route::get('deals', 'MainController@getDeals');
Route::get('cart', 'MainController@getCart');
Route::get('checkout', 'MainController@getCheckout');
Route::get('deal', 'MainController@getDeal');
Route::get('faq', 'MainController@getFAQ');
Route::get('airtime', 'MainController@getAirtime');
Route::get('hotels', 'MainController@getHotels');
Route::get('travelstart', 'MainController@getTravelStart');
Route::get('enterprise', 'MainController@getEnterprise');

Route::get('login', 'LoginController@getLogin');
Route::get('register', 'LoginController@getRegister');
Route::post('login', 'LoginController@postLogin');
Route::post('register', 'LoginController@postRegister');

Route::get('dashboard', 'MainController@getDashboard');
Route::get('transactions', 'MainController@getTransactions');

Route::get('wallet', 'MainController@getWallet');
Route::get('deposit', 'MainController@getKloudPayDeposit');
Route::get('invoices', 'MainController@getInvoices');
Route::get('invoice', 'MainController@getInvoice');

Route::get('logout', 'LoginController@getLogout');

/***** Admin routes *****/
Route::get('cobra', 'AdminController@getIndex');
Route::get('cobra-users', 'AdminController@getUsers');
Route::get('cobra-activate-user', 'AdminController@getActivateUser');
Route::get('cobra-suspend-user', 'AdminController@getSuspendUser');

Route::get('cobra-deals', 'AdminController@getDeals');
Route::get('cobra-auctions', 'AdminController@getAuctions');
Route::get('cobra-transactions', 'AdminController@getTransactions');
Route::get('cobra-add-deal', 'AdminController@getAddDeal');
Route::post('cobra-add-deal', 'AdminController@postAddDeal');
Route::get('cobra-add-auction', 'AdminController@getAddAuction');
Route::post('cobra-add-auction', 'AdminController@postAddAuction');
Route::get('cobra-end-auction', 'AdminController@getEndAuction');

Route::get('cobra-add-coupon', 'AdminController@getAddCoupon');
Route::post('cobra-add-coupon', 'AdminController@postAddCoupon');

Route::get('cobra-coupon', 'AdminController@getCoupon');
Route::get('cobra-coupons', 'AdminController@getCoupons');

Route::get('cobra-comments', 'AdminController@getComments');
Route::get('cobra-comment', 'AdminController@getComment');

Route::get('zohoverify/{url}', 'MainController@getZoho');
