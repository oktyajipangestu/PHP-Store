<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Utama@index');
Route::post('/pushData', 'Utama@store');
Route::get('/login', 'Login@index');
Route::post('/Daftar', 'Login@register');
Route::post('/Masuk', 'Login@login');
Route::get('/Keluar', 'Login@logout');
Route::post('/AddCart', 'Order@Order');
Route::get('/Keranjang', 'Order@Keranjang');
Route::get('/Checkout', 'Order@Checkout');
Route::get('/Checkout_list', 'Order@Checkout_list');
Route::get('/Confirm', 'Order@Confirm');
Route::post('/Konfirm', 'Order@Confirm_simpan');