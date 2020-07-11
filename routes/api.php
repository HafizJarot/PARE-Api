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


Route::post('user/register/penyewa','Api\Auth\RegisterController@registerPenyewa');
Route::post('user/register/pemilik','Api\Auth\RegisterController@registerPemilik');

Route::post('user/login','Api\Auth\LoginController@login');

Route::get('user/email/verify/{id}', 'Api\Auth\VerificationController@verify')->name('api.verification.verify');
Route::get('user/email/resend', 'Api\Auth\VerificationController@resend')->name('api.verification.resend');
Route::get('user/profile', 'Api\Penyewa\UserController@profile');


Route::get('produk/all','Api\Penyewa\ProdukController@index');
Route::post('produk/search','Api\Penyewa\ProdukController@search');

Route::get('produk','Api\Pemilik\ProdukController@index');
Route::post('produk/store', 'Api\Pemilik\ProdukController@store');
Route::post('produk/{id}/update', 'Api\Pemilik\ProdukController@update');
Route::get('produk/{id}/delete','Api\Pemilik\ProdukController@delete');

Route::get('order/pemilik','Api\Pemilik\OrderController@myOrders');

//Route::post('order','Api\Penyewa\OrderControllerq@order');
Route::post('order/store', 'Api\Penyewa\OrderController@store');
Route::get('order/penyewa', 'Api\Penyewa\OrderController@myOrders');
