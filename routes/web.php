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

Route::prefix('/users')->group(function() {
    Route::post('/first-user', 'UsersController@storeFirstUser')->name('users.store-first-user');
    Route::get('/profile', 'UsersController@profile')->name('users.profile');
    Route::post('/profile', 'UsersController@updateProfile')->name('users.save-profile');
});
Route::resource('/users', 'UsersController');
