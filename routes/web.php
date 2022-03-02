<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('sign_in');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/upload_single', function () {
    return view('upload_single');
});
Route::get('/upload_bulk', function () {
    return view('upload_bulk');
});
Route::get('/search_student', "App\Http\Controllers\StudentsController@search");
Route::get('/idcard_details', "App\Http\Controllers\StudentsController@idcard_details");
Route::get('/idcard_info_edit/{id}', "App\Http\Controllers\StudentsController@idcard_info_edit");
Route::post('/idcard_info_update', "App\Http\Controllers\StudentsController@idcard_info_update");
// Route::post('/photo_upload', "App\Http\Controllers\StudentsController@photo_upload");
Route::post('/idcard_photo_upload', "App\Http\Controllers\StudentsController@idcard_photo_upload");
Route::post('/idcard_status_update', "App\Http\Controllers\StudentsController@idcard_status_update");
Route::post('/upload_single', "App\Http\Controllers\StudentsController@add_student_single");
Route::post('/upload_bulk', "App\Http\Controllers\StudentsController@add_student_bulk");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
