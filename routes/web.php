<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::resource('/jabatan', 'JabatanController');

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::resource('/golongan', 'GolonganController');
Route::resource('/pegawai', 'PegawaiController');
Route::resource('/kategori','KategoryLemburController');
Route::resource('/lembur','lemburController');
Route::resource('/tunjangan','TunjanganController');
Route::resource('/tunjanganp','TunjanganPegawaiController');
Route::resource('/penggajian','PenggajianController');