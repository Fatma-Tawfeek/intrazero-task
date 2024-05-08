<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiplomaController;
use App\Http\Controllers\CategoryController;

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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/admin/login', [AdminController::class, 'getLoginPage'])->name('admin.get.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
});

// Dashboard Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // categories routes
    Route::resource('/categories', CategoryController::class);
    // diplomas routes
    Route::resource('/diplomas', DiplomaController::class);
});



require __DIR__ . '/auth.php';
