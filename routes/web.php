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
    return view('templates.default');
});


Route::resource('/notif', 'superadmin\NotifikasiPemilikReklameController')->only('index');
Route::get('/notif/{id}', 'superadmin\NotifikasiPemilikReklameController@update')->name('notif.update');
Route::resource('/users', 'superadmin\PemilikReklameController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
