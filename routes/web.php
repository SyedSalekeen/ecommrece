<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;




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


Route::get('login',[LoginController::class, 'index'])->name('login');
Route::post('login_submit',[LoginController::class, 'login_submit'])->name('login_submit');


// frontend login
Route::get('signup',[LoginController::class, 'signup'])->name('signup');
Route::post('signup_submit',[LoginController::class, 'signup_submit'])->name('signup_submit');

Route::get('login-user',[LoginController::class, 'login_user'])->name('login_user');



Route::group(['middleware' => 'auth'], function() {
Route::get('/dashboard',[DashbordController::class, 'index'])->name('dasboard');



// Category routes
Route::get('categories',[CategoryController::class, 'index'])->name('categories');
Route::get('create-category',[CategoryController::class, 'create'])->name('create_category');
Route::post('store_category',[CategoryController::class, 'store'])->name('store_category');
Route::get('edit-category/{id}',[CategoryController::class, 'edit'])->name('edit_category');
Route::put('update_category/{id}',[CategoryController::class, 'update'])->name('update_category');
Route::get('delete_category/{id}',[CategoryController::class, 'delete'])->name('delete_category');


// product routes start
Route::get('products',[ProductController::class, 'index'])->name('products');
Route::get('create-product',[ProductController::class, 'create'])->name('create_product');
Route::post('store_product',[ProductController::class, 'store'])->name('store_product');
Route::get('edit-product/{id}',[ProductController::class, 'edit'])->name('edit_product');
Route::put('update-product/{id}',[ProductController::class, 'update'])->name('update_product');


// users route start
Route::get('users',[UserController::class, 'index'])->name('users');
Route::get('create-user',[UserController::class, 'create'])->name('create_user');
Route::post('store-user',[UserController::class, 'store'])->name('store_user');
Route::get('edit-user/{id}',[UserController::class, 'edit'])->name('edit_user');
Route::put('update_user/{id}',[UserController::class, 'update'])->name('update_user');




Route::get('logout',[LoginController::class, 'logout'])->name('logout');




});



// Frontend work
Route::get('/',[FrontendController::class, 'index'])->name('website');
