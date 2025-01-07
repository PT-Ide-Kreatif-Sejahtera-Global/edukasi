<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [WelcomeController::class, 'welcome'])->name('home');
Route::get('/daftarinstruktur', [WelcomeController::class, 'showInstructor'])->name('showinstructor');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:Admin'])->group(function () {
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
    Route::get('/manageadmin', [App\Http\Controllers\UserController::class, 'adminindex'])->name('manageadmin');


    //Create
    Route::get('/tambahinstructor', [App\Http\Controllers\InstructorController::class, 'tambah'])->name('tambahinstructor');
    Route::get('/tambah', [App\Http\Controllers\KategoriController::class, 'tambah'])->name('tambah');
    Route::get('/tambahcourse', [App\Http\Controllers\CourseController::class, 'tambah'])->name('tambahcourse');
    Route::get('/tambahsection', [App\Http\Controllers\SectionController::class, 'tambah'])->name('tambahsection');
    Route::get('/tambahcontent', [App\Http\Controllers\ContentController::class, 'tambah'])->name('tambahcontent');
    Route::get('/tambahcoupon', [App\Http\Controllers\CouponController::class, 'tambah'])->name('tambahcoupon');
    Route::get('/tambahadmin', [App\Http\Controllers\UserController::class, 'admincreate'])->name('tambahadmin');
    //Delete
    Route::get('/deleteuser/{id}', [App\Http\Controllers\InstructorController::class, 'destroy'])->name('deleteinstructor');
    Route::get('/deletecourse/{id}', [App\Http\Controllers\CourseController::class, 'delete'])->name('deletecourse');
    Route::get('/deletekategori/{id}', [App\Http\Controllers\KategoriController::class, 'delete'])->name('deletekategori');
    Route::get('/deletesection/{id}', [App\Http\Controllers\SectionController::class, 'delete'])->name('deletesection');
    Route::get('/deletecontent/{id}', [App\Http\Controllers\ContentController::class, 'delete'])->name('deletecontent');
    Route::get('/deletecoupon/{id}', [App\Http\Controllers\CouponController::class, 'delete'])->name('deletecoupon');
    Route::get('/hapusadmin/{id}', [App\Http\Controllers\UserController::class, 'admindelete'])->name('deleteadmin');

    //Submit
    Route::post('/submitinstructor', [App\Http\Controllers\InstructorController::class, 'submitinstructor'])->name('submitinstructor');
    Route::post('/submitcourse', [App\Http\Controllers\CourseController::class, 'submit'])->name('submitcourse');
    Route::post('/submit', [App\Http\Controllers\KategoriController::class, 'submit'])->name('submit');
    Route::post('/submitsection', [App\Http\Controllers\SectionController::class, 'submit'])->name('submitsection');
    Route::post('/submitcontent', [App\Http\Controllers\ContentController::class, 'submit'])->name('submitcontent');
    Route::post('/submitcoupon', [App\Http\Controllers\CouponController::class, 'submit'])->name('submitcoupon');
    Route::post('/submitadmin', [App\Http\Controllers\UserController::class, 'submitadmin'])->name('submitadmin');

    //Edit
    Route::get('/editcourse{id}', [App\Http\Controllers\CourseController::class, 'edit'])->name('editcourse');
    Route::get('/editkategori{id}', [App\Http\Controllers\KategoriController::class, 'edit'])->name('editkategori');
    Route::get('/editinstructor{id}', [App\Http\Controllers\InstructorController::class, 'edit'])->name('editinstructor');
    Route::get('/editsection{id}', [App\Http\Controllers\SectionController::class, 'edit'])->name('editsection');
    Route::get('/editcontent{id}', [App\Http\Controllers\ContentController::class, 'edit'])->name('editcontent');
    Route::get('/editcoupon{id}', [App\Http\Controllers\CouponController::class, 'edit'])->name('editcoupon');
    Route::get('/editadmin/{id}', [App\Http\Controllers\UserController::class, 'adminedit'])->name('editadmin');
    //update
    Route::put('/updatecourse{id}', [App\Http\Controllers\CourseController::class, 'update'])->name('updatecourse');
    Route::put('/updateinstructor{id}', [App\Http\Controllers\InstructorController::class, 'update'])->name('updateinstructor');
    Route::put('/updatesection{id}', [App\Http\Controllers\SectionController::class, 'update'])->name('updatesection');
    Route::put('/updatecontent{id}', [App\Http\Controllers\ContentController::class, 'update'])->name('updatecontent');
    Route::put('/updatekategori{id}', [App\Http\Controllers\KategoriController::class, 'update'])->name('updatekategori');
    Route::put('/updateprofile', [App\Http\Controllers\ProfileController::class, 'update'])->name('updateprofile');
    Route::put('/updatecoupon{id}', [App\Http\Controllers\CouponController::class, 'update'])->name('updatecoupon');
    Route::put('/updateadmin/{id}', [App\Http\Controllers\UserController::class, 'adminupdate'])->name('updateadmin');
});

Route::get('/courses', [App\Http\Controllers\CoursesController::class, 'mycourses'])->name('courses');
Route::get('/students{course}', [App\Http\Controllers\CoursesController::class, 'courseStudents'])->name('students');

require __DIR__ . '/auth.php';
