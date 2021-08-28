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
Route::get('/warranty', 'WarrantyFormPageController@index')->middleware('auth');
Route::get('/warranty/{uid}', 'WarrantyFormPageController@index')->middleware('auth');
Route::get('/my_warranty', 'WarrantyFormPageController@warrantytable')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/product', 'WarrantyFormPageController@getProductHTM');
Route::post('/postwarranty', 'WarrantyFormPageController@postWarranty');
