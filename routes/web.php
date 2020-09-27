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

Route::get('/employeecosts', 'EmployeeCostController@index')->name('employeecosts');
Route::get('/employeecosts', 'EmployeeCostController@edit')->name('employeecosts');
Route::resource('employeecosts', 'EmployeeCostController');

Route::get('/discounts', 'DiscountController@index')->name('discounts');
Route::get('/discounts', 'DiscountController@edit')->name('discounts');
Route::resource('discounts', 'DiscountController');

Route::get('/totalcosts', 'CompanyCostController@totalCosts')->name('totalcosts');
Route::get('/companycosts', 'CompanyCostController@index')->name('companycosts');
Route::get('/companycosts', 'CompanyCostController@edit')->name('companycosts');
Route::resource('companycosts', 'CompanyCostController');

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories', 'CategoryController@edit')->name('categories');
Route::resource('categories', 'CategoryController');

Route::get('/subcategories', 'SubCategoryController@index')->name('subcategories');
Route::get('/subcategories', 'SubCategoryController@edit')->name('subcategories');
Route::resource('subcategories', 'SubCategoryController');

Route::get('/quoteterms', 'QuoteTermsController@index')->name('quoteterms');
Route::resource('quoteterms', 'QuoteTermsController');

Route::get('/pricelists', 'PriceListController@index')->name('pricelists');
Route::get('/pricelists', 'PriceListController@edit')->name('pricelists');
Route::resource('pricelists', 'PriceListController');

Route::get('/businessdetails', 'BusinessDetailController@index')->name('businessdetails');
Route::get('/businessdetails', 'BusinessDetailController@edit')->name('businessdetails');
Route::resource('businessdetails', 'BusinessDetailController');