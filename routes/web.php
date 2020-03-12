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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', 'HomeController@index')->name('home');

Route::post('language', 'LanguageController@setLanguage')->name('language');


Route::group(['prefix'=>'admin','middleware' => ['level', 'auth']], function () {
    Route::get('/', function () {
        return view('backend.welcome');
    });
    Route::post('products/status', 'ProductController@status')->name('products.status');
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('users', 'userController');
});

Auth::routes();


