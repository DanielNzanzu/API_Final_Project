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


/**
 * pages routes
 **/
Route::get('/', 'PagesController@index')->name('home.index');
Route::get('/menus', 'PagesController@menus')->name('home.menu.index');
Route::get('/menu/{slug}', 'PagesController@menu')->name('home.menu.show');

/**
 * basket routes
 */
Route::get('/cart', 'CartController@index')->name('home.cart.index');
Route::post('/menu/{slug}', 'CartController@store')->name('home.cart.store');
Route::delete('/cart/{menu}', 'CartController@destroy')->name('home.cart.remove');
Route::get('/checkout', 'CartController@checkout')->name('home.checkout.index');
Route::post('/checkout', 'CartController@complete')->name('home.checkout.store');
Route::get('/checkout/thankyou/{order}', 'CartController@thankyou')->name('checkout.thankyou');
Route::get('/donate/thankyou/{donation}', 'CartController@charityThankyou')->name('charity.thankyou');



Auth::routes(['verify' => true]);

Route::get('/verify/2fa', 'Auth\TwoFactorController@index')->name('2fa.index');
Route::post('/verify/2fa', 'Auth\TwoFactorController@verifyToken')->name('2fa.verify');


/**
 * Client account dashboard
 **/
Route::prefix('account')
    ->middleware('auth')
    ->group(function(){

        Route::get('/', 'AccountController@index')->name('account.index');

//        Route::get('/profile', 'AccountController@profile')->name('account.profile.index');
//        Route::post('/profile', 'AccountController@profileUpdate')->name('account.profile.edit');
//        Route::get('/address', 'AccountController@address')->name('account.address.index');
//        Route::post('/address', 'AccountController@addressUpdate')->name('account.address.edit');

        // corporate application (restaurant | charity)
        Route::prefix('corporate')
            ->group(function () {

                Route::get('/', 'AccountController@corporate')->name('account.corporate.index');
                Route::post('/', 'AccountController@application')->name('account.corporate.application.store');

                Route::get('/application/restaurant/{id}', 'AccountController@restaurantApplication')->name('account.corporate.restaurant.application');
                Route::get('/application/charity/{ref}', 'AccountController@charityApplication')->name('account.corporate.charity.application');
                Route::post('/application/restaurant/{id}', 'AccountController@restaurantUpdate')->name('account.corporate.restaurant.update');
                Route::post('/application/charity/{ref}', 'AccountController@charityUpdate')->name('account.corporate.charity.update');

            });

        //restaurant management
        Route::namespace('Restaurant')
            ->prefix('restaurant')
            ->group(function (){

                Route::get('/', 'DashboardController@details')->name('account.restaurant.details.index');

                //menus
                Route::get('/menus', 'MenuController@index')->name('account.restaurant.menu.index');
                Route::get('/menus/create', 'MenuController@create')->name('account.restaurant.menu.create');
                Route::post('/menus/create', 'MenuController@store')->name('account.restaurant.menu.store');
                Route::get('/menu/{slug}', 'MenuController@show')->name('account.restaurant.menu.show');

                //orders
                Route::get('/orders', 'OrderController@index')->name('account.restaurant.order.index');
                Route::get('/order/{ref}', 'OrderController@show')->name('account.restaurant.order.show');
                Route::post('/order/{ref}', 'OrderController@update')->name('account.restaurant.order.update');

                //stats
                Route::get('/statistics', 'DashboardController@statistics')->name('account.restaurant.statistic.index');
                Route::get('/statistics/orderchart', 'DashboardController@orderChart')->name('account.restaurant.statistic.orderChart');
            });

        //charity management
        Route::namespace('Charity')
            ->prefix('charity')
            ->group(function (){

                Route::get('/', 'DashboardController@details')->name('account.charity.details.index');

                //menus
                Route::get('/donations', 'DashboardController@donations')->name('account.charity.donation.index');
                Route::get('/donation/{ref}', 'DashboardController@donation')->name('account.charity.donation.show');

                //stats
                Route::get('/statistics', 'DashboardController@statistics')->name('account.charity.statistic.index');
                Route::get('/statistics/donationchart', 'DashboardController@donationChart')->name('account.charity.statistic.donationChart');
            });

        //client management
        Route::namespace('Client')
            ->prefix('dashboard')
            ->group(function (){

                //orders
                Route::get('/orders', 'DashboardController@orders')->name('account.client.order.index');
                Route::get('/order/{ref}', 'DashboardController@order')->name('account.client.order.show');
            });
    });


/**
 * Admin account dashboard
 */
Route::namespace('Admin')
    ->prefix('admin')
    ->group(function(){

        // authentication
        Route::namespace('Auth')->group(function () {
            Route::get('/register', 'RegisterController@create')->name('admin.register');
            Route::post('/register', 'RegisterController@store')->name('admin.register.store');
            Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
            Route::post('/login', 'LoginController@login')->name('admin.login.enter');
            Route::post('/reset', 'LoginController@loginAgent')->name('admin.login.enter');
            Route::post('/logout', 'LoginController@logout')->name('admin.logout');

            Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
            Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
            Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('admin.password.reset');
            Route::post('/password/reset','ResetPasswordController@reset')->name('admin.password.update');

            Route::get('/verify/2fa', 'TwoFactorController@index')->name('admin.2fa.index');
            Route::post('/verify/2fa', 'TwoFactorController@verifyToken')->name('admin.2fa.verify');
        });

        // dashboard
        Route::middleware('auth:admin')->group(function () {
            Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
            Route::get('/user/chart', 'DashboardController@barChart')->name('admin.dashboard.user.chart');
            Route::get('/order/chart', 'DashboardController@orderChart')->name('admin.dashboard.order.chart');
            Route::get('/donation/chart', 'DashboardController@donationChart')->name('admin.dashboard.donation.chart');

            //restaurants
            Route::get('/restaurants', 'DashboardController@restaurants')->name('admin.restaurant.index');
            Route::get('/restaurant/{ref}', 'DashboardController@restaurant')->name('admin.restaurant.show');

            //charities
            Route::get('/charities', 'DashboardController@charities')->name('admin.charity.index');
            Route::get('/charity/{ref}', 'DashboardController@charity')->name('admin.charity.show');

            //applications
            Route::prefix('application')->group(function (){
                Route::get('/restaurants/', 'DashboardController@applicationRestaurants')->name('admin.restaurant.application.index');
                Route::get('/restaurant/{ref}', 'DashboardController@applicationRestaurant')->name('admin.restaurant.application.show');
                Route::post('/restaurant/{ref}', 'DashboardController@applRestUpdate')->name('admin.restaurant.application.update');
                Route::get('/charities/', 'DashboardController@applicationCharities')->name('admin.charity.application.index');
                Route::get('/charity/{ref}', 'DashboardController@applicationCharity')->name('admin.charity.application.show');
                Route::post('/charity/{ref}', 'DashboardController@applCharUpdate')->name('admin.charity.application.update');
            });

            //roles & permission
            Route::get('/roles', 'RoleController@index')->name('admin.role.index');
            Route::get('/roles/create', 'RoleController@create')->name('admin.role.create');
            Route::post('/roles/create', 'RoleController@store')->name('admin.role.store');
            Route::get('/permissions', 'PermissionController@index')->name('admin.permission.index');
            Route::get('/permissions/create', 'PermissionController@create')->name('admin.permission.create');
            Route::post('/permissions/create', 'PermissionController@store')->name('admin.permission.store');
        });

    });
