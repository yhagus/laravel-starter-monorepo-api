<?php

declare(strict_types=1);

namespace App\Common\Providers;

use Illuminate\Support\ServiceProvider;

final class CommonServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrations();
        $this->loadFactories();
    }

    private function loadMigrations(): void
    {
        $migrationsPath = dirname(__DIR__, 3).'/database/migrations';

        if (is_dir($migrationsPath)) {
            $this->loadMigrationsFrom($migrationsPath);
        }
    }

    private function loadFactories(): void
    {
        $factoriesPath = dirname(__DIR__, 3).'/database/factories';

        if (is_dir($factoriesPath)) {
            $this->loadFactoriesFrom($factoriesPath);
        }
    }
}
