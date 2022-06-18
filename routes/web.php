<?php

use Illuminate\Support\Facades\Route;

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
    return view('backend.auth.login');
});

/*********************Extra Routes************************/


/**********************Backend routes***********************************/
Route::group(['prefix' => 'admin',  'namespace' => 'App\Http\Controllers\Backend','middleware'=>['backendloginAuth','preventBackHistory']], function(){
Route::match(['get','post'],'login','AuthController@login');
Route::match(['get','post'],'forgot/password','AuthController@forgotPassword');
Route::match(['get','post'],'change/password/{id}','AuthController@changePassword');

});

Route::group(['prefix' => 'admin',  'namespace' => 'App\Http\Controllers\Backend','middleware'=>['afterbackendLoginAuth','preventBackHistory']], function(){
Route::match(['get','post'],'dashboard','AuthController@dashboard');
Route::match(['get','post'],'logout','AuthController@logout');
Route::match(['get','post'],'profile','AuthController@MyProfile');

/**************************Routes of clients********************************/
Route::match(['get','post'],'add/client','ClientController@addClient');
Route::match(['get','post'],'edit/client/{slug}','ClientController@editClient');
Route::match(['get','post'],'delete/client','ClientController@deleteClient');
Route::match(['get','post'],'view/client/{slug}','ClientController@viewClient');
Route::match(['get','post'],'list/clients','ClientController@listClients');


/**************************Routes of cars********************************/
Route::match(['get','post'],'list/cars','CarController@listCars');
Route::match(['get','post'],'add/car','CarController@addCar');
Route::match(['get','post'],'edit/car/{car_code}','CarController@editCar');
Route::match(['get','post'],'delete/car','CarController@deleteCar');
Route::match(['get','post'],'view/car/{car_code}','CarController@viewCar');

/**************************Routes of Damage********************************/
Route::match(['get','post'],'list/damage/reports','DamageController@listDamageReports');
Route::match(['get','post'],'add/damage/report','DamageController@addDamageReport');
Route::match(['get','post'],'edit/damage/report/{damage_slug}','DamageController@EditDamageReport');
Route::match(['get','post'],'delete/damage/report','DamageController@deleteDamageReport');
Route::match(['get','post'],'view/damage/report/{damage_slug}','DamageController@viewDamageReport');
Route::match(['get','post'],'click-add-work','DamageController@clickAddWork');

/*****************Routes of Contract****************************************/
Route::match(['get','post'],'/list/contracts','ContractController@listContracts');
Route::match(['get','post'],'/add/contract','ContractController@addContract');
Route::match(['get','post'],'/edit/contract/{contract_number}','ContractController@editContract');
Route::match(['get','post'],'/view/contract/{contract_number}','ContractController@viewContract');
Route::match(['get','post'],'/delete/contract','ContractController@deleteContract');

/*****************Routes of Extend days****************************************/
Route::match(['get','post'],'/add/extend/days/{id}','ContractController@addExtendDay');
Route::match(['get','post'],'/edit/extend/days/{id}','ContractController@editExtendDay');
Route::match(['get','post'],'/delete/extend/days','ContractController@deleteExtendDay');
Route::match(['get','post'],'/fetch/extend/days','ContractController@fetchExtendDayDetails');
/*****************Routes of Invoices****************************************/
Route::match(['get','post'],'/list/invoices','InvoiceController@listInvoices');
Route::match(['get','post'],'/add/invoice','InvoiceController@addInvoice');
Route::match(['get','post'],'/edit/invoice/{invoice_slug}','InvoiceController@editInvoice');
Route::match(['get','post'],'/delete/invoice','InvoiceController@deleteInvoice');
Route::match(['get','post'],'/fetch/car/damages','InvoiceController@fetchCarDamages');
Route::match(['get','post'],'/fetch/client/contracts','InvoiceController@fetchClientContracts');
Route::match(['get','post'],'/fetch/contract/total/amount','InvoiceController@fetchContractorTotalAmount');

Route::match(['get','post'],'/download/invoice/{invoice_slug}','InvoiceController@downloadInvoice');


});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
