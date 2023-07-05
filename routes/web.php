<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\ListProductController;
use App\Http\Controllers\HomePageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//home page
Route::get('/', [HomePageController::class, 'index']);


//Login dan register
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);



//halaman dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/product', 'DashboardProductController')->middleware('session:Tenant');
Route::get('/dashboard/administrator', [DashboardController::class, 'administrator'])->middleware('session:Administrator');
Route::get('/dashboard/tenant', [DashboardController::class, 'tenant'])->middleware('session:Tenant');
Route::get('/dashboard/member', [DashboardController::class, 'member'])->middleware('session:Member');


//users
Route::resource('/users', 'Backend\UserController')->middleware('session:Administrator');

//category
Route::resource('/category', 'Backend\CategoryController')->middleware('session:Administrator');

//deposit history
Route::resource('/deposit', 'Backend\DepositHistoryController')->middleware('session:Administrator');


//product
Route::resource('/product', 'Backend\ProductController')->middleware('session:Tenant');






//frontend
Route::get('/list/product', [ListProductController::class, 'index']);


// Route::get('/getme', [UserController::class, 'getme']);




