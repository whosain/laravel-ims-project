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

// Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('companies','CompanyController');
// Route::get('/company', 'CompanyController@index')->name('company');
// Route::get('/apiCompany', 'CompanyController@show')->name('api.company');
// Route::post('/company', 'CompanyController@store')->name('company');
// Route::get('/company/{id}/edit', 'CompanyController@edit');
// Route::resource('deleteCompany', 'CompanyController');

Route::resource('companyViews','CompanyController');
Route::get('/company', 'CompanyController@index')->name('company');
Route::get('/showCompany','CompanyController@index')->name('showCompany');
Route::post('/addCompany', 'CompanyController@store');
Route::resource('updateCompany','CompanyController');
Route::resource('deleteCompany','CompanyController');

Route::resource('customerView','CustomerSvnController');
Route::get('/customers','CustomerSvnController@index')->name('customers');
Route::get('/showCustomers','CustomerSvnController@index')->name('showCustomers');
Route::post('/addCustomer', 'CustomerSvnController@store');
Route::resource('updateCustomer','CustomerSvnController');
Route::resource('deleteCustomer','CustomerSvnController');
// Route::resource('customer','CustomerSvnController');

Route::resource('buildingView','CustomerbuildingController');
Route::get('/buildings','CustomerbuildingController@index')->name('buildings');
Route::get('/showBuildings','CustomerbuildingController@index')->name('showBuildings');
Route::post('/addBuilding', 'CustomerbuildingController@store');
Route::resource('updateBuilding','CustomerbuildingController');
Route::resource('deleteBuilding','CustomerbuildingController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
