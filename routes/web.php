<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SchoolRegisterController;


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
    return view('main');
});
Route::get('/import_excel', function () {
    return view('import_excel');
});

//Route::get('/import_excel', [App\Http\Controllers\QuestionsController::class,'index']);
Route::post('/import_excel/import', [App\Http\Controllers\QuestionsController::class,'import']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/selectform',function(){
return view('selectform');
})->name('selectform');
Route::get('/individual/register', function () {
return view('auth.individual');
})->name('individual');
// Route::get('register/{school}', function ($school) {
//     return view('auth.register',compact($school));
//     })->name('register');
Route::resource('register',SchoolRegisterController::class);

Route::get('/register/{school?}',[App\Http\Controllers\SchoolRegisterController::class,'about']);

Route::get('/registerschool',[App\Http\Controllers\SchoolRegistrationDetailsController::class,'about'])->name('registerschool');


Route::get('/payment', [App\Http\Controllers\PaymentController::class,'index'])->name('payment');
Route::get('/success', [App\Http\Controllers\PaymentController::class,'success']);
// Route::post('/payment', [App\Http\Controllers\PaymentController::class,'payment']);
Route::get('/payment-page',function(){
    return view('payments.payment-page');
})->name('payment-page');

Route::post('/pay' , [App\Http\Controllers\PaymentController::class,'pay']);
Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])->name('admin')->middleware('admin');
Route::resource('/coupons', CouponsController::class)->middleware('admin');

Route::resource('/questions', QuizController::class)->middleware('admin');

Route::get('/exams',[App\Http\Controllers\QuizQuestionsController::class,'index'])->name('exams')->middleware('auth');

Route::get('/exampage',[App\Http\Controllers\ExamController::class,'index'])->name('exampage')->middleware('auth');










