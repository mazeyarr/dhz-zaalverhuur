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

Route::get('/', 'HomeController@index')->name('landing');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => 'auth'], function () {
    Route::name('admin.')->group(function () {
        Route::get('/admin', 'AdminController@index')->name('home');

        Route::get('/admin/contracts', 'AdminController@indexContracts')->name('contracts');
        Route::post('/admin/contracts/new', 'AdminController@saveContract')->name('contracts.save');

        Route::get('/admin/users', 'AdminController@indexUsers')->name('users');
        Route::get('/admin/user/{id}', 'AdminController@indexUserAccount')->name('user.account');
        Route::get('/admin/user/{id}/logout', 'AdminController@logoutUser')->name('user.logout');
        Route::get('/admin/user/{id}/password', 'AdminController@updateUserPassword')->name('user.password.update');

    });
});