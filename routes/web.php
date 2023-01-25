<?php

use Illuminate\Support\Facades\Route;


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
    return view('welcome');
});

//route resource
Route::resource('/groups', \App\Http\Controllers\GroupController::class);

//route resource
Route::resource('/members', \App\Http\Controllers\MemberController::class);

//route resource
Route::resource('/posts', \App\Http\Controllers\PostController::class);

//route resource2
Route::resource('/students', \App\Http\Controllers\StudentController::class);

//route resource2
Route::resource('/tests', \App\Http\Controllers\TestController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
