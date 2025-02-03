<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UsersController;
use App\Http\Controllers\api\CoursesController;
use App\Http\Controllers\api\EnrollmentsController;
use App\Http\Controllers\api\InstructorsController;
use App\Http\Controllers\api\ReviewsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// GET
Route::get('/users', [UsersController::class, 'index']);

Route::get('/courses', [CoursesController::class, 'index']);

Route::get('/enrollments', [EnrollmentsController::class, 'index']);

Route::get('/reviews', [ReviewsController::class, 'index']);

Route::get('/instructors', [InstructorsController::class, 'index']);

// POST
Route::post('/users', [UsersController::class, 'store']);

Route::post('/courses', [CoursesController::class, 'store']);

Route::post('/instructors', [InstructorsController::class, 'store']);

Route::post('/reviews', [ReviewsController::class, 'store']);

// PUT
Route::put('/user/{id}', [UsersController::class, 'update']);

Route::put('/course/{id}', [CoursesController::class, 'update']);

Route::put('/instructor/{id}', [InstructorsController::class, 'update']);

Route::put('/review/{id}', [ReviewsController::class, 'update']);

// DELETE
Route::delete('/user/{id}', [UsersController::class, 'destroy']);

Route::delete('/course/{id}', [CoursesController::class, 'destroy']);

Route::delete('/instructor/{id}', [InstructorsController::class, 'destroy']);

Route::delete('/review/{id}', [ReviewsController::class, 'destroy']);
