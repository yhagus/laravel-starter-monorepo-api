<?php

declare(strict_types=1);

use App\Admin\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->prefix('password')->group(function (): void {
    Route::patch('/', [PasswordController::class, 'update']);
});
