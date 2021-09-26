<?php

use Illuminate\Support\Facades\Route;
use App\Models\Size;
use \App\Http\Controllers\Backend\SizeController;
use \App\Http\Controllers\Backend\AdminController;
use \App\Http\Controllers\Backend\CostumeTypeController;
use \App\Http\Controllers\Backend\CostumeController;
use App\Http\Controllers\Frontend\HomeController;
use \App\Http\Controllers\Customer\Auth\LoginController;
use \App\Http\Controllers\Frontend\CustomerController;
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
//    return view('welcome');
    Route::post('/home', [HomeController::class,'index'])->name('home');

});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');


Route::get('/home', [\App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('home');
Route::get('/product/{id}', [HomeController::class, 'productDetail'])->name('product.detail');
Route::get('/product/{id}', [HomeController::class, 'productDetail'])->name('product.detail');

Route::get('/customer/create', [CustomerController::class, 'create'])->name('frontend.customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('frontend.customer.store');





Route::prefix('backend/')->name('backend.')->group(function()
{
    Route::resource('size',SizeController::class);
    Route::resource('costumeType',CostumeTypeController::class);
    Route::resource('admin',AdminController::class);
    Route::resource('costume',CostumeController::class);

});


Route::prefix('/customer')->name('customer.')->namespace('Customer')->group(function(){

    Route::get('/dashboard',[\App\Http\Controllers\Frontend\HomeController::class,'dashboard'])->name('home');
    Route::get('/profile',[\App\Http\Controllers\Frontend\HomeController::class,'profile'])->name('profile');
    Route::namespace('Auth')->group(function(){
        //Login Routes
        Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
        Route::post('/login',[LoginController::class,'login']);
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');

    });
});

