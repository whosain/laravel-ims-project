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
    return view('welcome');
});



//route form master
Route::get('/jenis','JenisController@index');
Route::get('/vendor','VendorSvnController@index');
Route::get('/lokasi','LokasiController@index');


//route form master datatables
Route::get('jenis', ['uses'=>'JenisController@index', 'as'=>'jenis.index']);
Route::get('vendor', ['uses'=>'VendorSvnController@index', 'as'=>'vend.index']);
Route::get('lokasi', ['uses'=>'LokasiController@index', 'as'=>'lok.index']);


//route view
Route::resource('jenis_view','JenisController');
Route::resource('vend_view','VendorSvnController');
Route::resource('lok_view','LokasiController');





//route Insert
Route::post('/insertjenis', 'JenisController@store');
Route::post('/insertvend', 'VendorSvnController@store');
Route::post('/insertlok', 'LokasiController@store');


//route Update
Route::resource('jenis_upd','JenisController');
Route::resource('vend_upd','VendorSvnController');
Route::resource('lok_upd','LokasiController');

//route delete
Route::resource('vend_del','VendorSvnController');
Route::resource('jenis_del','JenisController');
Route::resource('lok_del','LokasiController');








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
