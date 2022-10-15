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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\TardyController;

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	// Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	// Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	// Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	// Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	// Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	// Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	// Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/getDesignationByName', [LeaveController::class, 'getDesignationByName'])->name('getDesignationByName');

    Route::get('/employee-profile', [EmployeeProfileController::class, 'index'])->name('employee-profile.index');
    Route::post('/employee-profile/store', [EmployeeProfileController::class, 'store'])->name('employee-profile.store');
    Route::put('/employee-profile/update/{id}', [EmployeeProfileController::class, 'update'])->name('employee-profile.update');
    Route::delete('/employee-profile/delete/{id}', [EmployeeProfileController::class, 'destroy'])->name('employee-profile.destroy');

    Route::get('/leave', [LeaveController::class, 'index'])->name('leave.index');
    Route::post('/leave/store', [LeaveController::class, 'store'])->name('leave.store');
    Route::put('/leave/update/{id}', [LeaveController::class, 'update'])->name('leave.update');
    Route::delete('/leave/delete/{id}', [LeaveController::class, 'destroy'])->name('leave.destroy');
    Route::get('/leave/generate-pdf', [LeaveController::class, 'generatePDF'])->name('leave.generate-pdf');

    Route::get('/tardy', [TardyController::class, 'index'])->name('tardy.index');
    Route::post('/tardy/store', [TardyController::class, 'store'])->name('tardy.store');
    Route::put('/tardy/update/{id}', [TardyController::class, 'update'])->name('tardy.update');
    Route::delete('/tardy/destroy/{id}', [TardyController::class, 'destroy'])->name('tardy.destroy');
    Route::get('/tardy/generate-pdf', [TardyController::class, 'generatePDF'])->name('tardy.generate-pdf');
});