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

Auth::routes();
Route::get('/warranty', 'WarrantyFormPageController@index');
Route::get('/warranty/{uid}', 'WarrantyFormPageController@index');
Route::get('/my_warranty', 'WarrantyFormPageController@warrantytable')->middleware('auth');
Route::get('/my_warranty/{card_id}', 'WarrantyFormPageController@getWarrantyPDF')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/edit_profile', 'HomeController@editPage')->name('edit_profile')->middleware('auth');
Route::post('/edit_profile/submit', 'HomeController@update')->name('profile_update')->middleware('auth');
Route::get('/', 'HomeController@index')->middleware('auth');

Route::get('/get_response_product', 'WarrantyFormPageController@reponseProduct');

Route::get('/point_products', 'ProductController@index')->middleware('auth');
Route::get('/point_products_show', 'ProductController@indexNologin');
Route::get('/point_products_show/{id}', 'ProductController@getProductNologin');
Route::post('/transpoint', 'ProductController@transpoint')->middleware('auth');

Route::get('/product', 'WarrantyFormPageController@getProductHTM')->middleware('auth');
Route::get('/check_code', 'WarrantyFormPageController@checkcode')->middleware('auth');
Route::post('/postwarranty', 'WarrantyFormPageController@postWarranty')->middleware('auth');

Route::get('/line', 'LoginController@pageLine');
Route::get('/callback/login', 'LoginController@lineLoginCallBack');

Route::get('/tickets', 'TicketController@index')->middleware('auth');
Route::post('/buy-ticket', 'TicketController@buyTicket')->middleware('auth');
Route::get('/orders', 'OrderController@index')->middleware('auth');
Route::get('/update-order/{id}', 'OrderController@update');
Route::get('/get-time/{id}', 'OrderController@getTime');
Route::get('/close-order/{id}', 'OrderController@close');

Route::get('/withdraw', 'WithDrawController@index')->middleware('auth');