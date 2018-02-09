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
    Route::get('/prijava', 'AdministratorController@login')->name('administrator.login');
    Route::post('/prijava', 'AdministratorController@loginSubmit')->name('administrator.login.submit');
    Route::get('/profil', 'AdministratorController@profile')->name('administrator.profile');
    Route::post('/profil/urejanje', 'AdministratorController@profileEdit')->name('administrator.profile.edit');
    Route::prefix('prodajalec')->group(function () {
            Route::get('/', 'AdministratorController@sellers')->name('administrator.sellers');
            Route::get('/dodaj', 'AdministratorController@sellerAdd')->name('administrator.seller.add');
            Route::post('/dodaj', 'AdministratorController@sellerAddSubmit')->name('administrator.seller.add.submit');
            Route::get('/uredi/{id}', 'AdministratorController@sellerEdit')->name('administrator.seller.edit');
            Route::post('/uredi/{id}', 'AdministratorController@sellerEditSubmit')->name('administrator.seller.edit.submit');
    });
    Route::get('/', 'AdministratorController@index')->name('administrator.index');
});

Route::prefix('prodajalec')->group(function () {
    Route::get('/prijava', 'SellerController@login')->name('seller.login');
    Route::post('/prijava', 'SellerController@loginSubmit')->name('seller.login.submit');
    Route::get('/profil', 'SellerController@profile')->name('seller.profile');
    Route::post('/profil/urejanje', 'SellerController@profileEdit')->name('seller.profile.edit');
    Route::prefix('stranka')->group(function () {
        Route::get('/', 'SellerController@customers')->name('seller.customers');
        Route::get('/dodaj', 'SellerController@customerAdd')->name('seller.customer.add');
        Route::post('/dodaj', 'SellerController@customerAddSubmit')->name('seller.customer.add.submit');
        Route::get('/uredi/{id}', 'SellerController@customerEdit')->name('seller.customer.edit');
        Route::post('/uredi/{id}', 'SellerController@customerEditSubmit')->name('seller.customer.edit.submit');
    });
    Route::prefix('izdelek')->group(function () {
            Route::get('/', 'SellerController@items')->name('seller.items');
            Route::get('/dodaj', 'SellerController@itemAdd')->name('seller.item.add');
            Route::post('/dodaj', 'SellerController@itemAddSubmit')->name('seller.item.add.submit');
            Route::get('/uredi/{id}', 'SellerController@itemEdit')->name('seller.item.edit');
            Route::post('/uredi/{id}', 'SellerController@itemEditSubmit')->name('seller.item.edit.submit');
    });
    Route::prefix('narocila')->group(function () {
        Route::get('/', 'SellerController@orders')->name('seller.orders');
        Route::get('/{id}', 'SellerController@orderShow')->name('seller.order.show');
        Route::get('/{id}/potrdi', 'SellerController@orderApprove')->name('seller.order.approve');
        Route::get('/{id}/preklici', 'SellerController@orderCancel')->name('seller.order.cancel');
    });
    Route::get('/', 'SellerController@index')->name('seller.index');
});

Route::prefix('stranka')->group(function () {
    Route::get('/prijava', 'CustomerController@login')->name('customer.login');
    Route::post('/prijava', 'CustomerController@loginSubmit')->name('customer.login.submit');
    Route::get('/registracija', 'Auth\CustomerRegisterController@register')->name('customer.register');
    Route::post('/registracija', 'Auth\CustomerRegisterController@registerSubmit')->name('customer.register.submit');
    Route::get('/aktivacija/{activation_code}', 'CustomerController@activate')->name('customer.activate');
    Route::prefix('profil')->group(function () {
        Route::get('/', 'CustomerController@profile')->name('customer.profile');
        Route::post('/urejanje', 'CustomerController@profileEdit')->name('customer.profile.edit');
    });
    Route::prefix('narocila')->group(function () {
        Route::get('/', 'CustomerController@orders')->name('customer.orders');
        Route::get('/{id}', 'CustomerController@orderShow')->name('customer.order.show');
    });
    Route::prefix('kosarica')->group(function () {
        Route::get('/', 'ShoppingCartController@index')->name('shopping-cart.index');
        Route::get('/pregled', 'ShoppingCartController@order')->name('shopping-cart.order');
        Route::get('/oddaj', 'ShoppingCartController@orderSubmit')->name('shopping-cart.order.submit');
        Route::get('/dodaj/{item_id}', 'ShoppingCartController@add')->name('shopping-cart.add');
        Route::get('/uredi/{item_id}', 'ShoppingCartController@edit')->name('shopping-cart.edit');
        Route::post('/uredi/{item_id}', 'ShoppingCartController@editSubmit')->name('shopping-cart.edit.submit');
        Route::get('/odstrani/{item_id}', 'ShoppingCartController@remove')->name('shopping-cart.remove');
    });
    Route::get('/', 'CustomerController@index')->name('customer.index');
});

Route::prefix('izdelek')->group(function () {
    Route::get('/{id}', 'ItemController@index')->name('item.index');
    // Route::get('/{id}/rate/{rating}', 'ItemController@rate')->name('item.rate');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/', 'HomeController@index')->name('index');
