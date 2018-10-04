<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function () {
    Route::get('get/users', 'ApiController@getFetchUsers')->name('api.get.users');
    Route::post('post/user/create', 'ApiController@postCreateUser')->name('api.post.user.create');
    Route::post('post/user/save', 'ApiController@postSaveUser')->name('api.post.user.save');
});
