<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('produk/{id_pemilik}','Api\Penyewa\ProdukController@fetchProductByPemilik');
Route::post('produk/search','Api\Penyewa\ProdukController@search');

//Route::post('order','Api\Penyewa\OrderControllerq@order');
Route::post('snap', 'Api\Penyewa\OrderController@snapToken');
Route::post('snap/charge', 'Api\Penyewa\OrderController@snapToken');


Route::post('user/login','Api\Auth\LoginController@login');



Route::get('user/email/verify/{id}', 'Api\Auth\VerificationController@verify')->name('api.verification.verify');
Route::get('user/email/resend', 'Api\Auth\VerificationController@resend')->name('api.verification.resend');
Route::get('user/profile', 'Api\Penyewa\UserController@profile');
Route::get('user/profile/update', 'Api\Penyewa\UserController@updateProfile');
Route::post('user/ambil/uang', 'Api\Penyewa\UserController@ambilUang');

Route::get('kecamatan', 'Api\KecamatanController@index');

//pemilik

Route::group(['prefix' => 'pemilik'], function (){
    Route::post('register', 'Api\Auth\RegisterController@registerPemilik');
    Route::get('izin/{no_izin}', 'Api\Auth\RegisterController@checkNoIzin');

    Route::get('profile', 'Api\Pemilik\UserController@profile');

    Route::get('produk','Api\Pemilik\ProdukController@index');
    Route::post('produk/store', 'Api\Pemilik\ProdukController@store');
    Route::post('produk/{id}/update', 'Api\Pemilik\ProdukController@update');
    Route::post('produk/{id}/update/photo', 'Api\Pemilik\ProdukController@updatePhoto');
    Route::get('produk/{id}/delete','Api\Pemilik\ProdukController@delete');

    Route::get('order','Api\Pemilik\OrderController@myOrders');
});

//penyewa
Route::group(['prefix' => 'penyewa'], function (){

    Route::post('register','Api\Auth\RegisterController@registerPenyewa');
    Route::get('profile', 'Api\Penyewa\UserController@profile');

    Route::get('pemilik/all', 'Api\Penyewa\PemilikController@all');
    Route::get('pemilik/{id_kecamatan}', 'Api\Penyewa\PemilikController@search');

    Route::post('product', 'Api\Penyewa\ProdukController@product');

    Route::post('order/store', 'Api\Penyewa\OrderController@store');
    Route::get('order', 'Api\Penyewa\OrderController@myOrders');
});