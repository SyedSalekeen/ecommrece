<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\RolePermissionController;


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


Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login_submit', [LoginController::class, 'login_submit'])->name('login_submit');


// frontend login and signup routes
Route::get('signup', [LoginController::class, 'signup'])->name('signup');
Route::post('signup_submit', [LoginController::class, 'signup_submit'])->name('signup_submit');
Route::get('login-user', [LoginController::class, 'login_user'])->name('login_user');
Route::post('signin_submit', [LoginController::class, 'signin_submit'])->name('signin_submit');



// authenticated routes are in middelware
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashbordController::class, 'index'])->name('dasboard');
    // Category routes
    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('create-category', [CategoryController::class, 'create'])->name('create_category');
    Route::post('store_category', [CategoryController::class, 'store'])->name('store_category');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('edit_category');
    Route::put('update_category/{id}', [CategoryController::class, 'update'])->name('update_category');
    Route::get('delete_category/{id}', [CategoryController::class, 'delete'])->name('delete_category');


    // product routes start
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('create-product', [ProductController::class, 'create'])->name('create_product');
    Route::post('store_product', [ProductController::class, 'store'])->name('store_product');
    Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('edit_product');
    Route::put('update-product/{id}', [ProductController::class, 'update'])->name('update_product');


    // users route start
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('create-user', [UserController::class, 'create'])->name('create_user');
    Route::post('store-user', [UserController::class, 'store'])->name('store_user');
    Route::get('edit-user/{id}', [UserController::class, 'edit'])->name('edit_user');
    Route::put('update_user/{id}', [UserController::class, 'update'])->name('update_user');


    // review routes
    Route::get('reviews', [ReviewController::class, 'reviews'])->name('reviews');
    Route::get('edit-review/{id}', [ReviewController::class, 'edit_review'])->name('edit_review');
    Route::put('update-review/{id}', [ReviewController::class, 'update_review'])->name('update_review');
    Route::get('delete_review/{id}', [ReviewController::class, 'delete_review'])->name('delete_review');

    // feedbacks routes
    Route::get('feedbacks', [FeedbackController::class, 'index'])->name('feedbacks');

    // role permsissions routes
    Route::get('role-permissions', [RolePermissionController::class, 'index'])->name('role_permissions');
    Route::get('add-permission', [RolePermissionController::class, 'add_permission'])->name('add_permission');
    Route::post('submit_permission', [RolePermissionController::class, 'submit_permission'])->name('submit_permission');
    Route::get('edit-permission/{id}', [RolePermissionController::class, 'edit_permission'])->name('edit_permission');
    Route::post('update_permission', [RolePermissionController::class, 'update_permission'])->name('update_permission');




    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('submit_review', [FrontendController::class, 'submit_review'])->name('submit_review');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('logout_user', [LoginController::class, 'logout_user'])->name('logout_user');

    Route::post('remove_item_from_cart', [CartController::class, 'remove_item_from_cart'])->name('remove_item_from_cart');
    Route::post('remove_item_from_wishlet', [FrontendController::class, 'remove_item_from_wishlet'])->name('remove_item_from_wishlet');
});

// non authenticated routes
Route::get('catgeory/{id}', [FrontendController::class, 'catgeory'])->name('catgeory');
Route::get('add-to-cart/{id}', [FrontendController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('product-inner/{id}', [FrontendController::class, 'product_inner'])->name('product_inner');

// wishlet route
Route::get('add_to_wishlet/{id}', [FrontendController::class, 'add_to_wishlet'])->name('add_to_wishlet');

// Frontend work
Route::get('/', [FrontendController::class, 'index'])->name('website');
// website feedback submit route
Route::post('feedback', [FrontendController::class, 'feedback'])->name('feedback');
