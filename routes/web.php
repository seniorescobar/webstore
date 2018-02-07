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

Route::prefix('administrator')->group(function () {
    Route::get('/prijava', 'Auth\AdministratorLoginController@login')->name('administrator.login');
    Route::post('/prijava', 'Auth\AdministratorLoginController@loginSubmit')->name('administrator.login.submit');
    Route::get('/profil', 'AdministratorController@profile')->name('administrator.profile');
    Route::post('/profil/urejanje', 'AdministratorController@profileEdit')->name('administrator.profile.edit');
    Route::prefix('prodajalec')->group(function () {
            Route::get('/dodaj', 'AdministratorController@sellerAdd')->name('administrator.seller.add');
            Route::post('/dodaj', 'AdministratorController@sellerAddSubmit')->name('administrator.seller.add.submit');
            Route::get('/uredi/{id}', 'AdministratorController@sellerEdit')->name('administrator.seller.edit');
            Route::post('/uredi/{id}', 'AdministratorController@sellerEditSubmit')->name('administrator.seller.edit.submit');
    });
    Route::get('/', 'AdministratorController@index')->name('administrator.index');
});

Route::prefix('prodajalec')->group(function () {
    Route::get('/prijava', 'Auth\SellerLoginController@login')->name('seller.login');
    Route::post('/prijava', 'Auth\SellerLoginController@loginSubmit')->name('seller.login.submit');
    Route::get('/profil', 'SellerController@profile')->name('seller.profile');
    Route::post('/profil/urejanje', 'SellerController@profileEdit')->name('seller.profile.edit');
    Route::prefix('stranka')->group(function () {
            Route::get('/dodaj', 'SellerController@customerAdd')->name('seller.customer.add');
            Route::post('/dodaj', 'SellerController@customerAddSubmit')->name('seller.customer.add.submit');
            Route::get('/uredi/{id}', 'SellerController@customerEdit')->name('seller.customer.edit');
            Route::post('/uredi/{id}', 'SellerController@customerEditSubmit')->name('seller.customer.edit.submit');
    });
    Route::get('/', 'SellerController@index')->name('seller.index');
});

Route::prefix('stranka')->group(function () {
    Route::get('/prijava', 'Auth\CustomerLoginController@login')->name('customer.login');
    Route::post('/prijava', 'Auth\CustomerLoginController@loginSubmit')->name('customer.login.submit');
    Route::get('/registracija', 'Auth\CustomerRegisterController@register')->name('customer.register');
    Route::post('/registracija', 'Auth\CustomerRegisterController@registerSubmit')->name('customer.register.submit');
    Route::get('/aktivacija/{activation_code}', 'Auth\CustomerRegisterController@activate')->name('customer.activate');
    Route::get('/profil', 'CustomerController@profile')->name('customer.profile');
    Route::get('/', 'CustomerController@index')->name('customer.index');
});

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/', 'HomeController@index')->name('index');
