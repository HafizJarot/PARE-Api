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

Route::get('test', function () {
    event(new App\Events\UserRegisterEvent( 'Someone'));
    return "Event has been sent!";
});

Route::post('/finish', function(){
    return redirect()->route('welcome');
})->name('donation.finish');

Route::get('dashboard', 'superadmin\DashboardController@index')->name('dashboard');
Route::get('notify', 'superadmin\DashboardController@notify');
Route::get('admin/login', 'superadmin\AuthController@showFormLogin')->name('admin.login');
Route::post('admin/login', 'superadmin\AuthController@login')->name('admin.login.post');
Route::get('admin/logout', 'superadmin\AuthController@logout')->name('admin.logout');

Route::resource('/notif', 'superadmin\NotifikasiPemilikReklameController')->only('index');
Route::get('/notif/{id}', 'superadmin\NotifikasiPemilikReklameController@update')->name('notif.update');

Route::get('/user/pemilik', 'superadmin\UserController@pemilik')->name('user.pemilik');
Route::get('/user/pemilik/create', function () {return view('pages.admin.users.pemilik.create'); })->name('admin.pemilik.create');
Route::post('/user/pemilik/store', 'superadmin\UserController@store')->name('admin.pemilik.store');
Route::get('/user//pemilik/{id}', 'superadmin\UserController@show')->name('user.show');

Route::get('/user/penyewa', 'superadmin\UserController@penyewa')->name('user.penyewa');
Route::get('/user/{id}/penyewa', 'superadmin\UserController@showPenyewa')->name('user.show.penyewa');


//Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
