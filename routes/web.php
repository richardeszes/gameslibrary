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

Route::prefix('admin')->group(function () {
    Route::get('/', 'GamesController@index');

    Route::resource('games', 'GamesController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('consoles', 'ConsolesController');
    Route::resource('publishers', 'PublishersController');
    Route::resource('tags', 'TagsController');
});

Route::get('/', 'GamesController@index');
Route::post('games/export', 'GamesController@export');

Route::resource('games', 'GamesController');
Route::resource('categories', 'CategoriesController');
Route::resource('consoles', 'ConsolesController');
Route::resource('publishers', 'PublishersController');
Route::resource('tags', 'TagsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
