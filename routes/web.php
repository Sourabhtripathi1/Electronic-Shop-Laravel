<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;

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

Route::get('/del/{id}/{pic}',[VariantController::class,'delImg'])->name('delImg.del');
Route::post('/add/{id}',[VariantController::class,'addImg']);

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

// Route::get('',function(){

// });

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/shop', function () {
    return view('frontend.Shop');
});

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/product', function () {
    return view('frontend.ProductPage');
});


