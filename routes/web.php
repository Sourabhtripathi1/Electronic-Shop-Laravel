<?php

use App\Http\Controllers\AdminFunctions;
use App\Http\Controllers\AdminNavigationController;
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


Route::resource('/admins-product', ProductController::class)->middleware('isAdmin');
Route::resource('/admins-category', CategoryController::class)->middleware('isAdmin');
Route::resource('/admins-brand', BrandController::class)->middleware('isAdmin');

Route::get('/del/{id}/{pic}', [VariantController::class, 'delImg'])->name('delImg.del')->middleware('isAdmin');
Route::post('/add/{id}', [VariantController::class, 'addImg'])->middleware('isAdmin');

Route::post('/user/sign-up', [CustomerController::class, 'Customer_signup']);
Route::post('/user/sign-in', [CustomerController::class, 'Customer_login']);


Route::resource('/admins-product/variant', VariantController::class)->middleware('isAdmin');

Route::get('/admins-index',  [AdminNavigationController::class, 'adminIndex'])->middleware('isAdmin');

Route::get('/customers-list', [AdminNavigationController::class, 'CustomerList'])->middleware('isAdmin');

Route::get('/order/status/update', [AdminFunctions::class, 'updateCart'])->middleware('isAdmin');

Route::get('/orders-list', [AdminNavigationController::class, 'OrderList'])->middleware('isAdmin');

Route::get('/', [NavigationController::class, 'indexPage']);

Route::get('/shop', [NavigationController::class, 'shopPage']);

Route::get('/contact', [NavigationController::class, 'contactUsPage']);

Route::post('/query/post', [NavigationController::class, 'postQuery']);

Route::get('/about',  [NavigationController::class, 'about']);

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/user/login', [NavigationController::class, 'userLogin']);

Route::get('/user/logout', [NavigationController::class, 'userLogout']);


Route::group(["prefix" => "/user", "middleware" => "isValidUser"], function () {

    Route::get('dashboard', [NavigationController::class, 'userDashboard']);
    Route::get('all-orders', [NavigationController::class, 'userAllOrders']);
    Route::get('active-orders', [NavigationController::class, 'userActiveOrders']);
    Route::get('profile', [NavigationController::class, 'userProfile']);
    Route::get('wishlist', [NavigationController::class, 'userWishlist']);
    Route::get('cart', [NavigationController::class, 'userCart']);
    Route::get('checkout', [NavigationController::class, 'userCheckout']);
    Route::post('checkout', [CustomerController::class, 'userCheckout'])->middleware('PaymentValidate');
    Route::get('update', [CustomerController::class, 'UpdateUser']);
});

Route::post('/products/{id}/add-review', [ProductController::class, 'add_review'])->middleware('isValidUser');

Route::get('/products/wishlist/add/{id}/{var}', [CustomerController::class, 'add_wishlist'])->middleware('isValidUser');

Route::get('/products/wishlist/remove/{id}', [CustomerController::class, 'remove_wishlist'])->middleware('isValidUser');

Route::get('/products/wishlist/add/{id}/{var}/2', [CustomerController::class, 'add_wishlist2'])->middleware('isValidUser');



Route::post('/user/cart/add', [CustomerController::class, 'add_to_cart'])->middleware('isValidUser');
Route::get('/user/cart/add/{id}/{var}', [CustomerController::class, 'add_to_cart2'])->middleware('isValidUser');

Route::get('/user/cart/remove/{id}', [CustomerController::class, 'remove_to_cart'])->middleware('isValidUser');

Route::get('/user/cart/inc/{id}', [CustomerController::class, 'inc_to_cart'])->middleware('isValidUser');

Route::get('/user/cart/dec/{id}', [CustomerController::class, 'dec_to_cart'])->middleware('isValidUser');

Route::get('/payment/get', [NavigationController::class, 'managePayment']);

Route::post('/payment/response', [NavigationController::class, 'PaymentResponse']);

Route::get('/admins/validate/admin',  [AdminNavigationController::class, 'adminLogin']);

Route::post('/admin/login',  [AdminNavigationController::class, 'login']);

Route::get('/admin/logout',  [AdminNavigationController::class, 'logout']);

Route::get('/admin/todayorder',  [AdminNavigationController::class, 'todayOrders'])->middleware('isAdmin');







// Route::get('', [NavigationController::class, '']);
