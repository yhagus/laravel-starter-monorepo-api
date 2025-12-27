<?php

declare(strict_types=1);

return [
    App\Customer\Providers\AppServiceProvider::class,
    App\Common\Providers\ResetPasswordProvider::class,
    App\Common\Providers\RuleFacadeProvider::class,
    App\Common\Providers\StringFacadeProvider::class,
    Laravel\Tinker\TinkerServiceProvider::class,
    Dedoc\Scramble\ScrambleServiceProvider::class,
    Opcodes\LogViewer\LogViewerServiceProvider::class,
];
