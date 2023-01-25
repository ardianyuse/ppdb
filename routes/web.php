<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\MembersController;

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

// https://laravel.com/docs/9.x/routing
Route::get('/', [HomeController::class, 'index']);
// Route::get('/students', [StudentController::class, 'index']);
// Route::  ('  ', StudentController::class);

// Route::get('/', ['App\Http\Controllers\Controller', 'index']);

// $siswa = ['eddit', 'azzam', 'ridho'];
// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('students', StudentsController::class);
    Route::resource('groups', GroupsController::class);
    // nested resources
    // crud member, dilakukan didalam group
    Route::resource('groups.members', MembersController::class)->shallow();
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
