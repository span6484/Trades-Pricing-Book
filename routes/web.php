<?php

use App\EmployeeCost;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

use function App\Http\Controllers\index;

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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/customers', 'CustomerController@index')->name('customers');
Route::get('/customers', 'CustomerController@edit')->name('customers');
Route::resource('customers', 'CustomerController');

Route::get('/users', 'UserController@index');
Route::resource('users', 'UserController');

Route::get('/suppliers', 'SupplierController@index')->name('suppliers');
Route::get('/suppliers', 'SupplierController@edit')->name('suppliers');
Route::resource('suppliers', 'SupplierController');

Route::get('/materials', 'MaterialController@index')->name('materials');
Route::get('/materials', 'MaterialController@edit')->name('materials');
Route::resource('materials', 'MaterialController');

Route::get('/quoting', 'QuoteController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/grossmargin', 'GrossMarginController@index')->name('grossmargin');
Route::get('/grossmargin', 'GrossMarginController@edit')->name('grossmargin');
Route::resource('grossmargin', 'GrossMarginController');

Route::get('/employeecosts', 'CostController@index')->name('employeecosts');
Route::resource('employeecosts', 'CostController');

Route::get('/discounts', 'DiscountController@index')->name('discounts');
Route::resource('discounts', 'DiscountController');

Route::get('/companycosts', 'CostController@companyCosts')->name('companycosts');
Route::resource('companycosts', 'CompanyCostController');

Route::get('/totalcosts', 'CostController@totalCosts')->name('totalcosts');

Route::get('/categories', 'CategoryController@index');
Route::resource('categories', 'CategoryController');

Route::get('/subcategories', 'SubCategoryController@index');
Route::resource('subcategories', 'SubCategoryController');

Route::get('/quoteterms', 'QuoteTermsController@index')->name('quoteterms');
Route::resource('quoteterms', 'QuoteTermsController');
