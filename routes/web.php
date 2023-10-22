<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('/admins-product', ProductController::class);
Route::resource('/admins-category', CategoryController::class);
Route::resource('/admins-brand', BrandController::class);

Route::get('/del/{id}/{pic}', [VariantController::class, 'delImg'])->name('delImg.del');
Route::post('/add/{id}', [VariantController::class, 'addImg']);

Route::post('/user/sign-up', [CustomerController::class, 'Customer_signup']);
Route::post('/user/sign-in', [CustomerController::class, 'Customer_login']);


Route::resource('/admins-product/variant', VariantController::class);

Route::get('/admins-index', function () {
    return view('admin.admin-index');
});

Route::get('/customers-list', function () {
    return view('admin.ViewCustomers');
});

Route::get('/orders-list', function () {
    return view('admin.ViewOrders');
});

Route::get('/', [NavigationController::class, 'indexPage']);

Route::get('/shop', function () {
    return view('frontend.Shop');
});

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/product', function () {
    return view('frontend.ProductPage');
});

Route::post('/products/{id}/add-review', [ProductController::class, 'add_review'])->middleware('isValidUser');

Route::get('/user/login', function () {
    return view('frontend.LoginPage');
});






// Route::get('',function(){

// });
