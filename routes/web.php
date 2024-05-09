<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DiplomaController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudyPlanController;

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
    // admin login
    Route::get('/admin/login', [AdminController::class, 'getLoginPage'])->name('admin.get.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

    // tutor auth
    Route::get('/tutor/login', [TutorController::class, 'getLoginPage'])->name('tutor.get.login');
    Route::post('/tutor/login', [TutorController::class, 'login'])->name('tutor.login');
    Route::get('/tutor/register', [TutorController::class, 'getRegisterPage'])->name('tutor.get.register');
    Route::post('/tutor/register', [TutorController::class, 'register'])->name('tutor.register');

    // tutor auth
    Route::get('/student/login', [StudentController::class, 'getLoginPage'])->name('student.get.login');
    Route::post('/student/login', [StudentController::class, 'login'])->name('student.login');
    Route::get('/student/register', [StudentController::class, 'getRegisterPage'])->name('student.get.register');
    Route::post('/student/register', [StudentController::class, 'register'])->name('student.register');
});

// Dashboard Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // categories routes
    Route::resource('/categories', CategoryController::class);
    // diplomas routes
    Route::resource('/diplomas', DiplomaController::class);
    // subject routes
    Route::resource('/subjects', SubjectController::class);
    // courses routes
    Route::resource('/courses', CourseController::class);
    // study plans routes
    Route::resource('/study-plans', StudyPlanController::class);
    // roles routes
    Route::resource('/roles', RoleController::class);
    // users routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}/edit-role', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}/update-role', [UserController::class, 'update'])->name('users.update');
});

require __DIR__ . '/auth.php';
