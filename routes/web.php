<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RemittanceController;
use App\Http\Controllers\Admin\SearchRemitController;
use App\Http\Controllers\Admin\TenantRecordController;


// WEBPAGE AUTHENTICATION
Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('forgot-password', [PasswordResetController::class, 'create'])->name('forgot-password');
Route::post('forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('forgot-password.send');

Route::get('reset-password/{token}', [PasswordResetController::class, 'resetPassword'])->name('reset-password');
Route::post('reset-password', [PasswordResetController::class, 'handleResetPassword'])->name('reset-password.send');


// ADMIN DASHBOARD
Route::get('dashboard', [AdminPanelController::class, 'dashboard'])->name('dashboard');
Route::post('logout', [AdminPanelController::class, 'logout'])->name('logout');

// Admin Profile routes
Route::put('profile-password-update/{id}', [ProfileController::class, 'passwordUpdate'])->name('profile-password.update');
Route::resource('profile', ProfileController::class);

// This route is for the admin Dashboard page Controller
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// This route is for the RemittanceController
Route::resource('remit', RemittanceController::class);

// This route is for the search functionality in the Remittance admin page
Route::get('search-remit', [SearchRemitController::class, 'search'])->name('remit.search');
// This route is for the search functionality in the Properties admin page

// Thess routes are for the TenantRecordController
Route::get('statement', [TenantRecordController::class, 'index'])->name('statement.index');
Route::get('statement/create', [TenantRecordController::class, 'create'])->name('statement.create');
Route::get('statement/generate-pdf', [TenantRecordController::class, 'generatePDF'])->name('statement.generate-pdf');


