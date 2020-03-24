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
Route::get('/stb','StbController@index');
Route::get('/stbdetail','StbDetailController@index');


//route form master datatables
Route::get('jenis', ['uses'=>'JenisController@index', 'as'=>'jenis.index']);
Route::get('vendor', ['uses'=>'VendorSvnController@index', 'as'=>'vend.index']);
Route::get('lokasi', ['uses'=>'LokasiController@index', 'as'=>'lok.index']);
Route::get('stb', ['uses'=>'StbController@index', 'as'=>'stb.index']);
Route::get('stbdetail', ['uses'=>'StbDetailController@index', 'as'=>'stbdetail.index']);



//route view
Route::resource('jenis_view','JenisController');
Route::resource('vend_view','VendorSvnController');
Route::resource('lok_view','LokasiController');
Route::resource('stb_view','StbController');
Route::resource('stbdetail_view','StbDetailController');





//route Insert
Route::post('/insertjenis', 'JenisController@store');
Route::post('/insertvend', 'VendorSvnController@store');
Route::post('/insertlok', 'LokasiController@store');
Route::post('/insertstb', 'StbController@insert');
Route::post('/insertstbdetail', 'StbDetailController@insert');


//route Update
Route::resource('jenis_upd','JenisController');
Route::resource('vend_upd','VendorSvnController');
Route::resource('lok_upd','LokasiController');
Route::resource('stb_upd','StbController');
Route::resource('stbdetail_upd','StbDetailController');

//route delete
Route::resource('vend_del','VendorSvnController');
Route::resource('jenis_del','JenisController');
Route::resource('lok_del','LokasiController');
Route::resource('stb_del','StbController');
Route::resource('stbdetail_del','StbDetailController');








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
