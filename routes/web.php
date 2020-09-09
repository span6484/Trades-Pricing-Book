<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CostController;
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

Route::get('/dashboard', function() {
    return view('dashboard');
});

Route::get('/customers', 'CustomerController@index');

Route::get('/users', 'UserController@index');

Route::get('/suppliers', function() {
    return view('suppliers');
});

Route::get('/materials', function() {
    return view('materials');
});

Route::get('/quoting', function() {
    return view('quoting');
});

Route::get('/admin', 'AdminController@index');

Route::get('/grossmargin', 'CostController@grossMargin')->name('grossmargin');
Route::get('/totalcosts', 'CostController@totalCosts')->name('totalcosts');
Route::get('/employeecosts', 'CostController@employeeCosts')->name('employeecosts');
Route::get('/companycosts', 'CostController@companyCosts')->name('companycosts');
Route::get('/discounts', 'CostController@discounts')->name('discounts');