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


Route::post('user/register','Api\Auth\RegisterController@register');
Route::post('user/login','Api\Auth\LoginController@login');
Route::get('user/produk','Api\Penyewa\ProdukController@index');
Route::post('user/order','Api\Penyewa\OrderController@order');
