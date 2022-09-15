<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\adminController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [mainController::class,'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
});

Route::get('/show_courses', [mainController::class,'show_courses']);
Route::get('/join_course/{id}', [mainController::class,'join_course']);
Route::get('/drop_course/{id}', [mainController::class,'drop_course']);
Route::get('/attendance', [mainController::class,'attendance']);
Route::get('/about_us', [mainController::class,'about_us']);
Route::get('/help', [mainController::class,'help']);


Route::get('/show_courses_admin', [adminController::class,'show_courses_admin']);
Route::get('/delete_course/{id}', [adminController::class,'delete_course']);
Route::get('/view_attendance/{id}', [adminController::class,'view_attendance']);
Route::get('/remove_student/{id}', [adminController::class,'remove_student']);
Route::get('/add_attendance/{id}', [adminController::class,'add_attendance']);
Route::get('/remove_attendance/{id}', [adminController::class,'remove_attendance']);
Route::get('/add_course', [adminController::class,'add_course']);
Route::post('/submit_course', [adminController::class,'submit_course']);