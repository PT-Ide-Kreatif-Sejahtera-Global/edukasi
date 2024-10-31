<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::middleware(['auth','Admin'])->group(function(){
    //tampilan awal atau index
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'admin'])->name('dashboard');
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment');
    Route::get('/rating', [App\Http\Controllers\RatingController::class, 'index'])->name('rating');
    Route::get('/course', [App\Http\Controllers\CourseController::class, 'index'])->name('course');
    Route::get('/instructor', [App\Http\Controllers\InstructorController::class, 'index'])->name('instructor');

    Route::get('/tambahinstructor', [App\Http\Controllers\InstructorController::class, 'tambah'])->name('tambahinstructor');
    Route::get('/deleteuser/{id}', [App\Http\Controllers\InstructorController::class, 'deleteuser'])->name('deleteuser');
    Route::post('/submitinstructor', [App\Http\Controllers\InstructorController::class, 'submitinstructor'])->name('submitinstructor');
});

