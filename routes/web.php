<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;

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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'performLogin'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'performRegister'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'reminders', 'as' => 'reminders.'], function () {
        Route::get('index', [ReminderController::class, 'index'])->name('index');
        Route::get('create', [ReminderController::class, 'create'])->name('create');
        Route::post('store', [ReminderController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ReminderController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ReminderController::class, 'update'])->name('update');
        Route::get('destroy/{id}', [ReminderController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('profile', [UserController::class, 'profile'])->name('profile');
        Route::post('update', [UserController::class, 'update'])->name('update');
        Route::post('updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');
    });

    Route::group(['prefix' => 'teams', 'as' => 'teams.'], function () {
        Route::get('index', [TeamController::class, 'index'])->name('index');
        Route::get('create', [TeamController::class, 'create'])->name('create');
        Route::post('store', [TeamController::class, 'store'])->name('store');
        Route::get('edit/{id}', [TeamController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [TeamController::class, 'update'])->name('update');
        Route::post('addMember/{id}', [TeamController::class, 'addMember'])->name('addMember');
    });
});
