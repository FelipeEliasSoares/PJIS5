<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/notifications', 'NotificationController@index')->name('notifications.index');
Route::post('/notifications/{notification}/accept', 'NotificationController@accept')->name('notifications.accept');
Route::post('/notifications/{notification}/reject', 'NotificationController@reject')->name('notifications.reject');


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
