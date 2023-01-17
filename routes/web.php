<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentController;

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
Route::get('/penasaran', [Controller::class, 'index']);
// Route::get('/students', [StudentController::class, 'index']);
Route::resource('students', StudentController::class);

// Route::get('/', ['App\Http\Controllers\Controller', 'index']);

// $siswa = ['eddit', 'azzam', 'ridho'];
// Route::get('/', function () {
//     return view('welcome');
// });
