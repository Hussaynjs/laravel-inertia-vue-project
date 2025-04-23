<?php

use App\Http\Controllers\Auth\Emailverification;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordConfirmationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    
    
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/forgot-password', [ResetPasswordController::class, 'requestPass'])
    ->name('password.request');

    Route::post('/forgot-password', [ResetPasswordController::class, 'sendEmail'])
    ->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])
    ->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])
    ->name('password.update');
});


Route::middleware('auth')->group(function(){
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');


Route::get('/email/verify', [Emailverification::class, 'notice'])
->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [Emailverification::class, 'handler'])
->middleware( 'signed')
->name('verification.verify');

Route::post('/email/verification-notification',[Emailverification::class, 'resend'])
->middleware('throttle:6,1')
->name('verification.send');

Route::get('/confirm-password', [PasswordConfirmationController::class, 'passwordConfirmed'])
->name('password.confirm');


Route::post('/confirm-password', [PasswordConfirmationController::class,  'create'])->middleware( 'throttle:6,1');

});