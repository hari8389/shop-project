<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\VendorController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//customer
Route::get('customer-login', [AuthController::class, 'index'])->name('customer-login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('customer-registration', [AuthController::class, 'registration'])->name('customer-registration');
Route::post('customer-post', [AuthController::class, 'postCustomerRegistration'])->name('customer-post'); 
// Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//vendor 
Route::get('vendor-list', [AuthController::class, 'vendor_list']);
Route::get('vendor_edit/{id}', [AuthController::class, 'vendor_edit'])->name('vendor_edit');
Route::post('vendor_update/{id}', [AuthController::class, 'vendor_update'])->name('vendor_update'); 
Route::get('vendor_destroy/{id}', [AuthController::class, 'vendor_destroy'])->name('vendor_destroy');
Route::post('vendor-post', [AuthController::class, 'postVendorRegistration'])->name('vendor-post'); 
Route::get('vendor-registration', [AuthController::class, 'vendor_registration'])->name('vendor-registration');


//customers
Route::get('customers-list', [AuthController::class, 'customers_list']);
Route::get('customer_edit/{id}', [AuthController::class, 'customer_edit'])->name('customer_edit');
Route::post('customer_updates/{id}', [AuthController::class, 'customer_updates'])->name('customer_updates'); 
Route::get('customer_destroy/{id}', [AuthController::class, 'customer_destroy'])->name('customer_destroy'); 
 
//category
Route::get('product_category', [AuthController::class, 'product_category'])->name('product_category'); 
Route::post('postCategory', [AuthController::class, 'postCategory'])->name('postCategory'); 
Route::get('category-list', [AuthController::class, 'category_list'])->name('category-list');
Route::get('category_edit/{id}', [AuthController::class, 'category_edit'])->name('category_edit');
Route::post('category-update/{id}', [AuthController::class, 'category_updates'])->name('category-update'); 
Route::get('category_destroy/{id}', [AuthController::class, 'category_destroy'])->name('category_destroy'); 

//product
Route::get('product_store', [ProductController::class, 'product_store'])->name('product_store'); 
Route::post('postProduct', [ProductController::class, 'postProduct'])->name('postProduct'); 
Route::get('product_list', [ProductController::class, 'product_list'])->name('product_list');
Route::get('product_edit/{id}', [ProductController::class, 'product_edit'])->name('product_edit');
Route::post('product_updates/{id}', [ProductController::class, 'product_updates'])->name('product_updates');
Route::get('product_destroy/{id}', [ProductController::class, 'product_destroy'])->name('product_destroy'); 
//sale
Route::get('sales_store', [SalesController::class, 'sales_store'])->name('sales_store'); 
Route::get('/getProduct/{id}', [ProductController::class, 'getProduct'])->name('getProduct');
Route::post('/fetch-products', [ProductController::class, 'fetchProduct']);
Route::post('/fetch-prices', [ProductController::class, 'fetchPrice']);
Route::post('postSales', [SalesController::class, 'postSale'])->name('postSales');
Route::get('sales_list', [SalesController::class, 'sale_list'])->name('sales_list'); 
Route::get('sales_edit/{id}', [SalesController::class, 'sales_edit'])->name('sales_edit');
Route::post('sales_updates/{id}', [SalesController::class, 'sales_updates'])->name('sales_updates');
Route::get('sales_destroy/{id}', [SalesController::class, 'sales_destroy'])->name('sales_destroy'); 


//purchase routes
Route::get('purchase_store', [VendorController::class, 'purchase_store'])->name('purchase_store'); 
Route::post('/fetchVendorPrice', [ProductController::class, 'fetchVendorPrice']);
Route::post('postPurchase', [VendorController::class, 'postPurchase'])->name('postPurchase');
Route::get('purchase_list', [VendorController::class, 'purchase_list'])->name('purchase_list'); 
Route::get('purchase_edit/{id}', [VendorController::class, 'purchase_edit'])->name('purchase_edit');
Route::post('purchase_updates/{id}', [VendorController::class, 'purchase_updates'])->name('purchase_updates');
Route::get('purchase_destroy/{id}', [VendorController::class, 'purchase_destroy'])->name('purchase_destroy'); 

//report
Route::get('report', [ProductController::class, 'report'])->name('report'); 
Route::post('/daterange/fetch_data', [ProductController::class,'fetch_data'])->name('daterange.fetch_data');
