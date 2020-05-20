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

//route form master
Route::get('/jenis','JenisController@index');
Route::get('/vendor','VendorSvnController@index');
Route::get('/lokasi','LokasiController@index');
Route::get('/stb','StbController@index');
Route::get('/stbdetail/{stbid}','StbDetailControllers@index');
Route::post('insertcust','StbDetailControllers@insertcustomer')->name('insertcust');
Route::get('/edit','StbDetailControllers@index');
Route::get('/treckingstb','TreckingStbController@index');
//autocomplete
Route::get('/treckingstb/caricustomer', 'TreckingStbController@DataCustomer');
Route::get('/treckingstb/caribuilding', 'TreckingStbController@DataBuilding');
Route::get('/treckingstb/carilocation', 'TreckingStbController@DataLocation');

//route form master datatables
Route::get('jenis', ['uses'=>'JenisController@index', 'as'=>'jenis.index']);
Route::get('vendor', ['uses'=>'VendorSvnController@index', 'as'=>'vend.index']);
Route::get('lokasi', ['uses'=>'LokasiController@index', 'as'=>'lok.index']);
Route::get('stb', ['uses'=>'StbController@index', 'as'=>'stb.index']);
Route::get('stbdetail', ['uses'=>'StbDetailControllers@index', 'as'=>'stbdetail.index']);
Route::get('treckingstb', ['uses'=>'TreckingStbController@index', 'as'=>'treckingstb.index']);

//route view
Route::resource('jenis_view','JenisController');
Route::resource('vend_view','VendorSvnController');
Route::resource('lok_view','LokasiController');
Route::resource('stb_view','StbController');
Route::resource('stbdetail_view','StbDetailControllers');

//route Insert
Route::post('/insertjenis', 'JenisController@store');
Route::post('/insertvend', 'VendorSvnController@store');
Route::post('/insertlok', 'LokasiController@store');
Route::post('/insertstb', 'StbControllers@insert');
Route::post('/insertstbdetail', 'StbDetailControllers@insert');



Route::post('/insertstbtrack', 'TreckingStbController@insert');

//route Update
Route::resource('jenis_upd','JenisController');
Route::resource('vend_upd','VendorSvnController');
Route::resource('lok_upd','LokasiController');
Route::resource('stb_upd','StbController');
Route::resource('stbdetail_upd','StbDetailControllers');

//route delete
Route::resource('vend_del','VendorSvnController');
Route::resource('jenis_del','JenisController');
Route::resource('lok_del','LokasiController');
Route::resource('stb_del','StbController');
Route::resource('stbdetail_del','StbDetailControllers');








///router Husein
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

Route::resource('buildingView','CustomerbuildingController');
Route::get('/buildings','CustomerbuildingController@index')->name('buildings');
Route::get('/showBuildings','CustomerbuildingController@index')->name('showBuildings');
Route::post('/addBuilding', 'CustomerbuildingController@store');
Route::resource('updateBuilding','CustomerbuildingController');
Route::resource('deleteBuilding','CustomerbuildingController');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
