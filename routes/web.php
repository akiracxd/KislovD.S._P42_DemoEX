<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [RequestController::class, 'index'])->name('dashboard');
    Route::get('/create', [RequestController::class, 'create'])->name('request.create');
    Route::post('/store', [RequestController::class, 'store'])->name('request.store');
    Route::delete('/requests/{request}', [RequestController::class, 'destroy'])->name('request.destroy');
});

Route::middleware((Admin::class))->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::patch('update', [RequestController::class, 'update'])->name('request.update');
});

require __DIR__ . '/auth.php';
