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
    return view('auth.login');
});

Auth::routes();


Route::resource('companyViews','CompanyController');
Route::get('/company', 'CompanyController@index')->name('company');
Route::get('/showCompany','CompanyController@index')->name('showCompany');
Route::post('/addCompany', 'CompanyController@store');
Route::resource('updateCompany','CompanyController');
Route::resource('deleteCompany','CompanyController');

Route::resource('customerView','CustomerSvnController');
Route::get('/customers','CustomerSvnController@index')->name('customers');
Route::get('/showCustomers','CustomerSvnController@index')->name('showCustomers');
Route::post('/addCustomer', 'CustomerSvnController@insert');
Route::resource('updateCustomer','CustomerSvnController');
Route::resource('deleteCustomer','CustomerSvnController');

Route::resource('buildingView','CustomerbuildingController');
Route::get('/buildings','CustomerBuildingController@index')->name('buildings');
Route::get('/showBuildings','CustomerbuildingController@index')->name('showBuildings');
Route::post('/addBuilding', 'CustomerbuildingController@store');
Route::resource('updateBuilding','CustomerbuildingController');
Route::resource('deleteBuilding','CustomerbuildingController');

Route::resource('asetView','ScnController');
Route::get('/scnAsets','ScnController@index')->name('scnAsets');
Route::get('/showAsets','ScnController@index')->name('showAsets');
Route::post('/addAset', 'ScnController@insert');
Route::resource('updateAset','ScnController');
Route::resource('deleteAset','ScnController');
Route::get('/treckingscn/carilocation', 'ScnController@DataLocation');

Route::get('/home', 'HomeController@index')->name('home');



















// Route::get('/scn','ScnController@index');
// Route::get('scn', ['uses'=>'ScnController@index', 'as'=>'scn.index']);
// Route::resource('scn_view','ScnController');
// Route::post('/insertscn', 'ScnController@insert');
// Route::resource('scn_upd','ScnController');
// Route::resource('scn_del','ScnController');

// Route::get('/scndetail','scnDetailController@index');
// Route::get('scndetail', ['uses'=>'scnDetailController@index', 'as'=>'scndetail.index']);
// Route::resource('scndetail_view','scnDetailController');
// Route::post('/insertscndetail', 'scnDetailController@insert');
// Route::resource('scndetail_upd','scnDetailController');
// Route::resource('scndetail_del','scnDetailController');