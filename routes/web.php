<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SurveysController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\PresencesController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/surveys', [SurveysController::class, 'index']);
Route::post('/surveys', [SurveysController::class, 'store']);

Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('students', StudentsController::class);
    
    Route::get('groups/{id}/attendances', [GroupsController::class, 'attendances']); 
    Route::post('groups/{id}/attendances_store', [GroupsController::class, 'attendances_store']); 
    Route::resource('groups', GroupsController::class);
    // nested resources
    // crud member, dilakukan didalam group
    Route::resource('groups.members', MembersController::class)->shallow();
    Route::resource('schedules', SchedulesController::class);
    // Route::resource('presences', PresencesController::class);
    Route::resource('schedules.presences', PresencesController::class)->shallow();
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

