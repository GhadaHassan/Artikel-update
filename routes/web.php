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

Route::get('/','WelcomeController@login');
Route::get('/home','WelcomeController@index');
Route::get('/search','WelcomeController@search');

// ------------------------- this route for dashboard -------------------------
// Route::get('dashboard','Backend\HomeController@index');
Route::namespace('Backend')->prefix('dashboard')->middleware('admin')->group(function(){

    Route::get('home','HomeController@index');

    Route::resource('users','UsersController')->except(['show','delete']);
    Route::delete('users/delete/{id}','UsersController@delete')->name('dashboard/users.delete');

    Route::resource('moduls','ModulsController')->except(['show','delete']);
    Route::delete('moduls/delete/{id}','ModulsController@delete')->name('dashboard/moduls.delete');

    Route::resource('artikels','ArtikelsController')->except(['show','delete']);
    Route::delete('artikels/delete/{id}','ArtikelsController@delete')->name('dashboard/artikels.delete');
    Route::get('/search','ArtikelsController@search');

});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
