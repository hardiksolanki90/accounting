<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/home', function () {
        return view('welcome');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // Users
    Route::get('users', "FrontControllers\UsersController@index")->name('user.list');
    Route::get('user/add', "FrontControllers\UsersController@create")->name('user.add');
    Route::post('user/add', "FrontControllers\UsersController@store");
    Route::get('user/edit/{id}', "FrontControllers\UsersController@edit")->name('user.edit');
    Route::post('user/edit/{id}', "FrontControllers\UsersController@update");
    Route::any('user/delete/{id}', "FrontControllers\UsersController@destroy")->name('user.delete');

    // Clients
    Route::get('clients', "FrontControllers\ClientController@index")->name('client.list');
    Route::get('client/add', "FrontControllers\ClientController@create")->name('client.add');
    Route::post('client/add', "FrontControllers\ClientController@store");
    Route::get('client/edit/{id}', "FrontControllers\ClientController@edit")->name('client.edit');
    Route::post('client/edit/{id}', "FrontControllers\ClientController@update");
    Route::any('client/delete/{id}', "FrontControllers\ClientController@destroy")->name('client.delete');

    // Bank
    Route::get('banks', "FrontControllers\BankController@index")->name('bank.list');
    Route::get('bank/add', "FrontControllers\BankController@create")->name('bank.add');
    Route::post('bank/add', "FrontControllers\BankController@store");
    Route::get('bank/edit/{id}', "FrontControllers\BankController@edit")->name('bank.edit');
    Route::post('bank/edit/{id}', "FrontControllers\BankController@update");
    Route::any('bank/delete/{id}', "FrontControllers\BankController@destroy")->name('bank.delete');

    // Invoice
    Route::get('invoices', "FrontControllers\InvoiceController@index")->name('invoice.list');
    Route::get('invoice/add', "FrontControllers\InvoiceController@create")->name('invoice.add');
    Route::post('invoice/add', "FrontControllers\InvoiceController@store");
    Route::get('invoice/edit/{id}', "FrontControllers\InvoiceController@edit")->name('invoice.edit');
    Route::post('invoice/edit/{id}', "FrontControllers\InvoiceController@update");
    Route::any('invoice/delete/{id}', "FrontControllers\InvoiceController@destroy")->name('invoice.delete');
    Route::any('invoice/download/{id}', "FrontControllers\InvoiceController@download")->name('invoice.download');

    // Income
    Route::get('incomes', "FrontControllers\IncomeController@index")->name('income.list');
    Route::get('income/add', "FrontControllers\IncomeController@create")->name('income.add');
    Route::post('income/add', "FrontControllers\IncomeController@store");
    Route::get('income/edit/{id}', "FrontControllers\IncomeController@edit")->name('income.edit');
    Route::post('income/edit/{id}', "FrontControllers\IncomeController@update");
    Route::any('income/delete/{id}', "FrontControllers\IncomeController@destroy")->name('income.delete');

    Route::get('get/invoice-details/{id}', 'FrontControllers\InvoiceController@getDetails')->name('getInvoiceDetails');
    Route::get('get/client-details/{id}', 'FrontControllers\ClientController@getDetails')->name('getClientDetails');

    Route::get('settings', 'FrontControllers\SettingController@index')->name('setting.list');
    Route::get('setting/add', 'FrontControllers\SettingController@create')->name('setting.add');
    Route::post('setting/add', 'FrontControllers\SettingController@store');
    Route::get('setting/edit/{id}', 'FrontControllers\SettingController@edit')->name('setting.edit');
    Route::post('setting/edit/{id}', 'FrontControllers\SettingController@update');

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});

Auth::routes();