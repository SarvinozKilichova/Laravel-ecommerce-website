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
Route::group(['middleware'=>'web'], function(){

	Route::match(['get', 'post'], '/', ['uses'=>'MainController@execute', 'as'=>'home']);

	Route::get('/search/{id}',  ['uses'=>'ProductsController@SearchExecute', 'as'=>'search'] );

	Route::get('/category/subcategory/{category}/{subcat}/{subid}',  ['uses'=>'ProductsController@SubcatExecute', 'as'=>'subcat'] );

	Route::get('/category/{category}/{catId}',  ['uses'=>'ProductsController@CategoryExecute', 'as'=>'category'] );

	Route::get('/product/{category}/{subcat}/{id}/{name}',  ['uses'=>'ProductsController@ProductExecute', 'as'=>'productId'] );

	Route::get('/discounts',  ['uses'=>'ProductsController@DiscountExecute', 'as'=>'discount'] );

	Route::get('/news',  ['uses'=>'NewsController@NewsIndex', 'as'=>'news'] );

	Route::get('/contact',  ['uses'=>'MainController@ContactIndex', 'as'=>'contact'] );

	Route::get('/news/{slug}',  ['uses'=>'NewsController@NewsIdExecute', 'as'=>'newsid'] );

	Route::post ('/product/filter', 'ProductsController@FilterExecute' )->name('filter');

	Route::get ('/product/search', 'ProductsController@searchExecute' )->name('search');

	


});

Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::post ('/product/addFeedback', 'ProductsController@AddFeedExecute' )->name('addFeedback')->middleware('auth');
Route::get('/cart', 'CartController@index')->name('cart')->middleware('auth');

Route::get('/user/dashboard', 'UserController@index')->name('userDashboard')->middleware('auth');

Route::post('/cart/update', 'CartController@UpdateExecute')->name('cartUpdate')->middleware('auth');

Route::post('/user/information/update', 'UserController@UpdateExecute')->name('userUpdate')->middleware('auth');

Route::post('/user/address/update', 'UserController@AddressExecute')->name('address')->middleware('auth');

Route::post('/user/information/changePassword', 'UserController@ChangeExecute')->name('changePassword')->middleware('auth');

Route::post ('/product/addCart', 'CartController@AddExecute' )->name('addCart')->middleware('auth');

Route::get ('/product/cart/delete/{id}', 'CartController@delete' )->name('deleteCart')->middleware('auth');

Route::get ('/product/cart/update/{id}', 'CartController@update' )->name('updateCart')->middleware('auth');

Route::get('/product/checkout', 'CheckoutController@index')->name('checkout')->middleware('auth');

Route::post ('/product/checkout/process', 'CheckoutController@AddExecute' )->name('order')->middleware('auth');

