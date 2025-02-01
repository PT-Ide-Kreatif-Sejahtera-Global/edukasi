<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UsersController;
use App\Http\Controllers\api\CoursesController;
use App\Http\Controllers\api\EnrollmentsController;


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

Route::get('/users', [UsersController::class, 'index']);

Route::get('/courses', [CoursesController::class, 'index']);

Route::get('/enrollments', [EnrollmentsController::class, 'index']);

Route::get('/reviews', [EnrollmentsController::class, 'index']);
