<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\HistoryController;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\TenantController;
use App\Http\Controllers\Backend\TransactionController;
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
Route::get('/dashboard/Administrator', [DashboardController::class, 'administrator'])->middleware('session:Administrator');
Route::get('/dashboard/Tenant', [DashboardController::class, 'tenant'])->middleware('session:Tenant');
Route::get('/dashboard/Member', [DashboardController::class, 'member'])->middleware('session:Member');

//users
Route::resource('/users', 'Backend\UserController')->middleware('session:Administrator');

//category
Route::resource('/category', 'Backend\CategoryController')->middleware('session:Administrator');

//deposit history
Route::resource('/deposit', 'Backend\DepositHistoryController')->middleware('session:Administrator');


//product
Route::resource('/product', 'Backend\ProductController')->middleware('session:Tenant');



//transaction
Route::get('/transaction/{id}', [TransactionController::class, 'index']);
Route::post('/transaction/{id}', [TransactionController::class, 'pesan']);

//check out
Route::get('/check-out', [TransactionController::class, 'check_out']);
Route::delete('/check-out/{id}', [TransactionController::class, 'delete']);

//konfirmasi
Route::get('/konfirmasi-check-out', [TransactionController::class, 'konfirmasi']);

//history
Route::get('/history', [HistoryController::class, 'index']);
Route::get('/history/{id}', [HistoryController::class, 'detail']);



Route::get('/tenant/pesanan', [TenantController::class, 'pesanan']);
Route::get('/tenant/riwayat-pesanan', [TenantController::class, 'riwayatPesanan'])->name('tenant.pesanan');
Route::get('/tenant/serahkan-pesanan/{id}', [TenantController::class, 'serahkanPesanan'])->name('tenant.serahkan-pesanan');


Route::get('/member/history-deposit', [MemberController::class, 'historyDeposit'])->name('member.history-deposit');
















