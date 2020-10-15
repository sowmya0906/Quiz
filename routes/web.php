<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CouponsController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/selectform',function(){
return view('selectform');
})->name('selectform');
Route::get('/individual/register', function () {
return view('auth.individual');
})->name('individual');
Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])->name('admin')->middleware('admin');
Route::resource('/coupons', CouponsController::class)->middleware('admin');
