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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/shop/{slug}','ShopController@shop')->name('shop');
//admin route
 Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'admin'],function(){
 Route::get('dashboard','DashboardController@index')->name('dashboard');
 Route::resource('category','CategoryController');
 Route::resource('product','ProductController');
 //active unactive
 Route::get('active/{id}','ProductController@active')->name('active');
  Route::get('unactive/{id}','ProductController@unactive')->name('unactive');
  
});