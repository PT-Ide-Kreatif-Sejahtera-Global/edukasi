<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Instructor;
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
    return redirect()->route('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::middleware(['auth','Admin', 'Instructor'])->group(function(){
    //tampilan awal atau index
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'admin'])->name('dashboard');
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'payment'])->name('payment');
    Route::get('/rating', [App\Http\Controllers\RatingController::class, 'index'])->name('rating');
    Route::get('/course', [App\Http\Controllers\CourseController::class, 'index'])->name('course');
    Route::get('/instructor', [App\Http\Controllers\InstructorController::class, 'index'])->name('instructor');
    Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori');
    Route::get('/section', [App\Http\Controllers\SectionController::class, 'index'])->name('section');
    Route::get('/content', [App\Http\Controllers\ContentController::class, 'index'])->name('content');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
    Route::get('/coupon', [App\Http\Controllers\CouponController::class, 'index'])->name('coupon');

    //Create
    Route::get('/tambahinstructor', [App\Http\Controllers\InstructorController::class, 'tambah'])->name('tambahinstructor');
    Route::get('/tambah', [App\Http\Controllers\KategoriController::class, 'tambah'])->name('tambah');
    Route::get('/tambahcourse', [App\Http\Controllers\CourseController::class, 'tambah'])->name('tambahcourse');
    Route::get('/tambahsection', [App\Http\Controllers\SectionController::class, 'tambah'])->name('tambahsection');
    Route::get('/tambahcontent', [App\Http\Controllers\ContentController::class, 'tambah'])->name('tambahcontent');
    Route::get('/tambahcoupon', [App\Http\Controllers\CouponController::class, 'tambah'])->name('tambahcoupon');
    //Delete
    Route::get('/deleteuser/{id}', [App\Http\Controllers\InstructorController::class, 'deleteuser'])->name('deleteuser');
    Route::get('/deletecourse/{id}', [App\Http\Controllers\CourseController::class, 'delete'])->name('deletecourse');
    Route::get('/deletekategori/{id}', [App\Http\Controllers\KategoriController::class, 'delete'])->name('deletekategori');
    Route::get('/deletesection/{id}', [App\Http\Controllers\SectionController::class, 'delete'])->name('deletesection');
    Route::get('/deletecontent/{id}', [App\Http\Controllers\ContentController::class, 'delete'])->name('deletecontent');
    Route::get('/deletecoupon/{id}', [App\Http\Controllers\CouponController::class, 'delete'])->name('deletecoupon');
    //Submit
    Route::post('/submitinstructor', [App\Http\Controllers\InstructorController::class, 'submitinstructor'])->name('submitinstructor');
    Route::post('/submitcourse', [App\Http\Controllers\CourseController::class, 'submit'])->name('submitcourse');
    Route::post('/submit', [App\Http\Controllers\KategoriController::class, 'submit'])->name('submit');
    Route::post('/submitsection', [App\Http\Controllers\SectionController::class, 'submit'])->name('submitsection');
    Route::post('/submitcontent', [App\Http\Controllers\ContentController::class, 'submit'])->name('submitcontent');
    Route::post('/submitcoupon', [App\Http\Controllers\CouponController::class, 'submit'])->name('submitcoupon');
    
    //Edit
    Route::get('/editcourse{id}', [App\Http\Controllers\CourseController::class, 'edit'])->name('editcourse');
    Route::get('/editkategori{id}', [App\Http\Controllers\KategoriController::class, 'edit'])->name('editkategori');
    Route::get('/editinstructor{id}', [App\Http\Controllers\InstructorController::class, 'edit'])->name('editinstructor');
    Route::get('/editsection{id}', [App\Http\Controllers\SectionController::class, 'edit'])->name('editsection');
    Route::get('/editcontent{id}', [App\Http\Controllers\ContentController::class, 'edit'])->name('editcontent');
    Route::get('/editcoupon{id}', [App\Http\Controllers\CouponController::class, 'edit'])->name('editcoupon');
    //update
    Route::put('/updatecourse{id}', [App\Http\Controllers\CourseController::class, 'update'])->name('updatecourse');
    Route::put('/updateinstructor{id}', [App\Http\Controllers\InstructorController::class, 'update'])->name('updateinstructor');
    Route::put('/updatesection{id}', [App\Http\Controllers\SectionController::class, 'update'])->name('updatesection');
    Route::put('/updatecontent{id}', [App\Http\Controllers\ContentController::class, 'update'])->name('updatecontent');
    Route::put('/updatekategori{id}', [App\Http\Controllers\KategoriController::class, 'update'])->name('updatekategori');
    Route::put('/updateprofile', [App\Http\Controllers\ProfileController::class, 'update'])->name('updateprofile');
    Route::put('/updatecoupon{id}', [App\Http\Controllers\CouponController::class, 'update'])->name('updatecoupon');
    
});
Route::middleware(['auth','Instructor'])->group(function(){
    Route::get('/courses', [App\Http\Controllers\CoursesController::class, 'mycourses'])->name('courses');
    Route::get('/students{course}', [App\Http\Controllers\CoursesController::class, 'courseStudents'])->name('students');

});
Route::middleware(['auth','Customer'])->group(function(){
    //tampilan awal atau index
    Route::get('/detail{id}', [App\Http\Controllers\Controller::class, 'detail'])->name('detail');
    Route::get('/pembayaran{id}', [App\Http\Controllers\PaymentController::class, 'index'])->name('pembayaran');

    //Create
    
    //Delete
    
    //Submit
    Route::post('/submitpayment{id}', [App\Http\Controllers\PaymentController::class, 'submit'])->name('submitpayment');
    Route::post('/discuss{id}', [App\Http\Controllers\Controller::class, 'storeDiscuss'])->name('discuss');
    Route::post('/comment{DiscussId}', [App\Http\Controllers\Controller::class, 'storeComment'])->name('comment');
    //Edit
    Route::get('/profileuser', [App\Http\Controllers\ProfileController::class, 'user'])->name('profileuser');
    //update
    Route::put('/update', [App\Http\Controllers\ProfileController::class, 'updateuser'])->name('update');
});

