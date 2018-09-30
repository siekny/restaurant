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


/*admin route*/

Auth::routes();
    Route::get('register', 'Auth\LoginController@showLoginForm')->name('register');
    Route::post('register', 'Auth\LoginController@login');
Route::get('/', 'FoodController@index');
Route::get('/home', 'FoodController@index')->name('home');
Route::get('/about', 'FoodController@about');
Route::get('/contact', 'FoodController@contact');
Route::get('/reservation', 'FoodController@reservation')->name('reservation');
Route::get('/allmenu/{id}', 'FoodController@allmenu')->name('allmenu');
Route::get('/menu/', 'FoodController@menu')->name('menu');
Route::post('/order', 'FoodController@order')->name('order');
Route::post('/order/store', 'FoodController@orderStore')->name('orderStore');
Route::get('/reservation/order/success','FoodController@orderSuccess')->name('success');
Route::get('/ordered/{id}', 'FoodController@ordered');
Route::get('/ordered.history/{cust_phone}', 'FoodController@history');

Route::group(['middleware' => 'auth'], function () {
   //Route Admin Dashboard
    Route::resource('admin','AdminController');
	Route::post('admin/up/{id}','AdminController@up');
	Route::post('admin/delete/{id}','AdminController@delete');

	Route::resource('category','CategoryController');
	Route::post('category/up/{id}','CategoryController@up');
	Route::post('category/delete/{id}','CategoryController@delete');

	// order
	Route::resource('food_order','FoodOrderController');
	Route::post('/food_order/{id}', 'FoodOrderController@delete');
	Route::post('/food_order.status/{id}', 'FoodOrderController@status');
	Route::post('/food/up/{id}', 'FoodOrderController@updatefood');
});
