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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ActivateAccountView', 'Auth\ActivateAccountController@ActivateAccountView')
                                        ->name('ActivateAccountView');
Route::get('/activated/{email}/token/{token}', 'Auth\ActivateAccountController@ActivateAccount')
                                                ->name('activated');


//ADMIN AUTH ROUTES
Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\HomeController@index')->name('admin');
    Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\Admin\LoginController@login');
    Route::post('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');
    Route::post('/password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')
    													->name('admin.password.email');
    Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')
    													->name('admin.password.request');
    Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset');   				Route::get('password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')
    													->name('admin.password.reset');	
    Route::get('/register', 'Auth\Admin\RegisterController@showRegistrationForm')->name('admin.register');	
    Route::post('/register', 'Auth\Admin\RegisterController@register');	
    //verify email
    Route::get('/ActivateAccountView', 'Auth\Admin\ActivateAccountController@ActivateAccountView')->name('admin.ActivateAccountView');
    Route::get('/activated/{email}/token/{token}', 
                    'Auth\Admin\ActivateAccountController@ActivateAccount')
                                                ->name('admin.activated');										
});



