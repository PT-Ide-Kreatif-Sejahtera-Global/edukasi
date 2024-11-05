<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
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

Route::get('/', [Controller::class, 'welcome'])->name('welcome');


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
    Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori');
    Route::get('/section', [App\Http\Controllers\SectionController::class, 'index'])->name('section');
    Route::get('/content', [App\Http\Controllers\ContentController::class, 'index'])->name('content');

    //Create
    Route::get('/tambahinstructor', [App\Http\Controllers\InstructorController::class, 'tambah'])->name('tambahinstructor');
    Route::get('/tambah', [App\Http\Controllers\KategoriController::class, 'tambah'])->name('tambah');
    Route::get('/tambahcourse', [App\Http\Controllers\CourseController::class, 'tambah'])->name('tambahcourse');
    Route::get('/tambahsection', [App\Http\Controllers\SectionController::class, 'tambah'])->name('tambahsection');
    Route::get('/tambahcontent', [App\Http\Controllers\ContentController::class, 'tambah'])->name('tambahcontent');
    //Delete
    Route::get('/deleteuser/{id}', [App\Http\Controllers\InstructorController::class, 'deleteuser'])->name('deleteuser');
    Route::get('/delete/{id}', [App\Http\Controllers\CourseController::class, 'delete'])->name('delete');
    Route::get('/delete/{id}', [App\Http\Controllers\KategoriController::class, 'delete'])->name('delete');
    Route::get('/delete/{id}', [App\Http\Controllers\SectionController::class, 'delete'])->name('delete');
    Route::get('/delete/{id}', [App\Http\Controllers\ContentController::class, 'delete'])->name('delete');
    //Submit
    Route::post('/submitinstructor', [App\Http\Controllers\InstructorController::class, 'submitinstructor'])->name('submitinstructor');
    Route::post('/submitcourse', [App\Http\Controllers\CourseController::class, 'submit'])->name('submitcourse');
    Route::post('/submit', [App\Http\Controllers\KategoriController::class, 'submit'])->name('submit');
    Route::post('/submitsection', [App\Http\Controllers\SectionController::class, 'submit'])->name('submitsection');
    Route::post('/submitcontent', [App\Http\Controllers\ContentController::class, 'submit'])->name('submitcontent');
    //Edit
    
    //update
    
});

