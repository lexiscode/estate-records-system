<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\RemittanceController;
use App\Http\Controllers\Admin\TenantInfoController;
use App\Http\Controllers\Admin\SearchRemitController;
use App\Http\Controllers\Admin\TenantRecordController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Admin\ServiceChargeController;
use App\Http\Controllers\Admin\SearchTenantInfoController;
use App\Http\Controllers\Admin\SearchServiceChargeController;
use App\Http\Controllers\Admin\SpecificTenantHistoryController;
use App\Http\Controllers\Admin\SearchSpecificTenantHistoryController;


// HOME
Route::get('/', [HomeController::class, '__invoke'])->name('home');


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

// This route is for the RemittanceController
Route::resource('remit', RemittanceController::class);

// This route is for the search functionality in the Remittance admin page
Route::get('search-remit', [SearchRemitController::class, 'search'])->name('remit.search');

// These routes are for the TenantRecordController
Route::get('statement', [TenantRecordController::class, 'index'])->name('statement.index');
Route::get('statement/create', [TenantRecordController::class, 'create'])->name('statement.create');
Route::get('statement/generate-pdf', [TenantRecordController::class, 'generatePDF'])->name('statement.generate-pdf');

// This route is for the TenantInfoController
Route::resource('tenant', TenantInfoController::class);
// This route is for the search functionality in the TenantInfo admin page
Route::get('search-tenant', [SearchTenantInfoController::class, 'search'])->name('tenant.search');


// This route is for the ServiceChargeController
Route::resource('service-charge', ServiceChargeController::class);
// This route is for the search functionality in the ServiceCharge admin page
Route::get('search-service-charge', [SearchServiceChargeController::class, 'search'])->name('service-charge.search');


// This route is for the SpecificTenantHistoryController
Route::get('tenant-history', [SpecificTenantHistoryController::class, 'index'])->name('tenant-history.index');
Route::get('tenant-history/{id}', [SpecificTenantHistoryController::class, 'show'])->name('tenant-history.show');
// This route is for the search functionality in the Tenant admin page
Route::get('search-tenant-history', [SearchSpecificTenantHistoryController::class, 'search'])->name('tenant-history.search');

