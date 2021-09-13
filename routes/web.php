<?php

use Illuminate\Support\Facades\Route;
use App\Models\Size;
use \App\Http\Controllers\Backend\SizeController;
use \App\Http\Controllers\Backend\AdminController;
use \App\Http\Controllers\Backend\CostumeTypeController;
use \App\Http\Controllers\Backend\CostumeController;

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

Auth::routes();

Route::get('/home', [\App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('home');

Route::prefix('backend/')->name('backend.')->group(function()
{
    Route::resource('size',SizeController::class);
    Route::resource('costumeType',CostumeTypeController::class);
    Route::resource('admin',AdminController::class);
    Route::resource('costume',CostumeController::class);

});

