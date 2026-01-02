<?php

declare(strict_types=1);

use App\Admin\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Admin\Http\Controllers\Auth\LoginController;
use App\Admin\Http\Controllers\Auth\RegisterController;
use App\Admin\Http\Controllers\Auth\ResetPasswordController;
use App\Admin\Http\Controllers\Auth\VerificationEmailController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function (): void {
    Route::middleware(['auth:api'])->group(function (): void {
        Route::get('/authorize', [AuthenticatedSessionController::class, 'authorize']);
        Route::post('/logout', [AuthenticatedSessionController::class, 'logout']);
    });

    Route::post('/register', [RegisterController::class, 'store']);
    Route::post('/refresh', [AuthenticatedSessionController::class, 'refresh']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/forgot-password', [ResetPasswordController::class, 'forgotPassword']);
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');

    Route::get('/email/verify/{id}/{hash}', [VerificationEmailController::class, 'store'])
        ->name('verification.verify');
    Route::post('/email-verification', [VerificationEmailController::class, 'create'])
        ->middleware(['auth', 'throttle:6,1']);
});
