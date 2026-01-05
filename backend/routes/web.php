<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ApiController;


// used for session debugging
Route::get('/_session_proof', function () {
    session()->put('count', session('count', 0) + 1);
    return session()->all();
});

// all products
Route::get('/prods', [ProductsController::class, 'index'])->name("products.index");

// show one product
Route::get('/prods/{id}/show', [ProductsController::class, 'show'])->name("products.show");    

// access form
Route::get('/prods/form', [ProductsController::class, 'create'])->name("products.form");

// send input to control
Route::post('/prods/store', [ProductsController::class, 'store'])->name("products.store");

// delete product
Route::get('/prods/{id}/del', [ProductsController::class, 'delete'])->name("products.delete");

// edit product
Route::get('/prods/{id}/edit', [ProductsController::class, 'edit'])->name("products.edit");

// update product
Route::post('/prods/update', [ProductsController::class, 'update'])->name("products.update");

// search for a product
Route::get('/prods/search', [ProductsController::class, 'search'])->name("products.search");

// show login
Route::get('/user/login', [UsersController::class, 'user_index'])->name("user.index");

// authentificate user
Route::post('/user/authuser', [UsersController::class, 'checkUser'])->name("user.login");

// user register page
Route::get('/user/register', [UsersController::class, 'RegisterForm'])->name("user.register");

// add user 
Route::post('/user/store', [UsersController::class, 'UserStore'])->name("user.store");

// Log Out
Route::get("/user/logout", [UsersController::class, "UserLogOut"])->name("user.logout");

// show cart
Route::get('/prods/cart', [CartsController::class, "Cart"])->name("product.cart");

// add to cart
Route::Post('/prods/add2cart', [CartsController::class, "Add2cart"])->name("products.add2cart");

// increase quantity
Route::post('/cart/increase/{id}', [CartsController::class, 'increase'])->name('cart.increase');

// decrease quantity
Route::post('/cart/decrease/{id}', [CartsController::class, 'decrease'])->name('cart.decrease');

// order a product
Route::Get('/prods/order', [OrdersController::class, "Order"])->name("product.order");

// payment
Route::Get('prods/payment', [OrdersController::class, "Payment"])->name("products.payment");

// create pdf
Route::Get('prods/pdf', [ProductsController::class, "PdfCreate"])->name("product.pdf");
