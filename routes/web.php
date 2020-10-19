<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\PaymentController;
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
    return view('selectform');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/selectform',function(){
return view('selectform');
})->name('selectform');
Route::get('/individual/register', function () {
return view('auth.individual');
})->name('individual');

Route::get('/payment', [App\Http\Controllers\PaymentController::class,'index'])->name('payment');
Route::get('/success', [App\Http\Controllers\PaymentController::class,'success']);
Route::post('/payment', [App\Http\Controllers\PaymentController::class,'payment']);
Route::get('/payment-page',function(){
    return view('payments.payment-page');
})->name('payment-page');

Route::post('/pay' , [App\Http\Controllers\PaymentController::class,'pay']);
Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])->name('admin')->middleware('admin');
Route::resource('/coupons', CouponsController::class)->middleware('admin');
