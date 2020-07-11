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
    return redirect()->route('dashboard');
});

Route::post('/finish', function(){
    return redirect()->route('welcome');
})->name('donation.finish');

Route::get('dashboard', 'superadmin\DashboardController@index')->name('dashboard');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('/notif', 'superadmin\NotifikasiPemilikReklameController')->only('index');
Route::get('/notif/{id}', 'superadmin\NotifikasiPemilikReklameController@update')->name('notif.update');
Route::get('/user', 'superadmin\PemilikReklameController@index')->name('user.index');
Route::get('/user/{id}', 'superadmin\PemilikReklameController@show')->name('user.show');


//Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
