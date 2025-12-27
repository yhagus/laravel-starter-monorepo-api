<?php

declare(strict_types=1);

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$vendorPath = dirname(__DIR__, 3).'/vendor';

putenv('COMPOSER_VENDOR_DIR='.$vendorPath);
$_ENV['COMPOSER_VENDOR_DIR'] = $vendorPath;
$_SERVER['COMPOSER_VENDOR_DIR'] = $vendorPath;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: 'up',
        apiPrefix: '',
    )
    ->withMiddleware(function (Middleware $middleware): void {})
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

return $app;
