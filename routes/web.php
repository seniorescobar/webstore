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

Route::prefix('administrator')->group(function() {
	Route::get('/prijava', 'Auth\AdministratorLoginController@login')->name('administrator.login');
	Route::post('/prijava', 'Auth\AdministratorLoginController@loginSubmit')->name('administrator.login.submit');
	Route::get('/profil', 'AdministratorController@profile')->name('administrator.profile');
	Route::get('/', 'AdministratorController@index')->name('administrator.index');
});
Route::prefix('prodajalec')->group(function() {
	Route::get('/prijava', 'Auth\SellerLoginController@login')->name('seller.login');
	Route::post('/prijava', 'Auth\SellerLoginController@loginSubmit')->name('seller.login.submit');
	Route::get('/profil', 'SellerController@profile')->name('seller.profile');
	Route::get('/', 'SellerController@index')->name('seller.index');
});
Route::prefix('stranka')->group(function() {
	Route::get('/prijava', 'Auth\CustomerLoginController@login')->name('customer.login');
	Route::post('/prijava', 'Auth\CustomerLoginController@loginSubmit')->name('customer.login.submit');
	Route::get('/registracija', 'Auth\RegisterController@register')->name('customer.register');
	Route::post('/registracija', 'Auth\RegisterController@registerSubmit')->name('customer.register.submit');
	Route::get('/profil', 'CustomerController@profile')->name('customer.profile');
	Route::get('/', 'CustomerController@index')->name('customer.index');
});
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/', 'HomeController@index')->name('home');
