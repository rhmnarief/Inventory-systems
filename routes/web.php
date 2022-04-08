<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecordProductController;
use App\Http\Controllers\RecordStocksController;
use App\Http\Controllers\StockController;
use Illuminate\Routing\RouteGroup;

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

route::get('/login',[LoginController::class, 'loginPage'])->name('login');
route::post('/postLogin',[LoginController::class, 'postLogin'])->name('postLogin');
route::get('/logout',[LoginController::class, 'logout'])->name('logout');


route::group(['middleware' =>['auth','checkLevel:admin']], function(){
    route::get('/home', [HomeController::class, 'index'])->name('home');
    route::get('/register',[LoginController::class, 'register'])->name('register');
    route::post('/register-admin',[LoginController::class, 'sendRegister'])->name('registerAdmin');
    route::get('/change-password',[LoginController::class, 'change'])->name('changePassword');
    route::post('/update-admin',[LoginController::class, 'update'])->name('updatePassword');





    route::get('/stock', [StockController::class, 'index'])->name('getStock');
    route::post('/add-stock', [StockController::class, 'store'])->name('addStock');
    route::get('/edit-stock/{id}',[StockController::class, 'edit'])->name('editStock');
    route::put('/update-stock/{id}',[StockController::class, 'update'])->name('updateStock');
    route::get('/delete-stock/{id}',[StockController::class, 'destroy'])->name('deleteStock');


    route::get('/product', [ProductController::class, 'index'])->name('getProduct');
    route::post('/add-product',[ProductController::class, 'store'])->name('addProduct');
    route::get('/edit-product/{id}',[ProductController::class, 'edit'])->name('editProduct');
    route::put('/update-product/{id}',[ProductController::class, 'update'])->name('updateProduct');
    route::get('/delete-product/{id}',[ProductController::class, 'destroy'])->name('deleteProduct');

    route::get('/record-product', [RecordProductController::class, 'index'])->name('getRecordProduct');
    route::post('/add-record-product', [RecordProductController::class, 'store'])->name('addRecordProduct');

    route::get('/record-stock', [RecordStocksController::class, 'index'])->name('getRecordStock');
    route::post('/add-record-stock', [RecordStocksController::class, 'store'])->name('addRecordStock');
    
});