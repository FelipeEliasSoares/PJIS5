<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;

// Existentes

// Novas
Route::get('/register/company', [CompanyController::class, 'create'])->name('register.company');
Route::post('/register/company', [CompanyController::class, 'store']);

Route::get('/register/member', [MemberController::class, 'create'])->name('register.member');
Route::post('/register/member', [MemberController::class, 'store']);