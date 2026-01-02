<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Common\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'first_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}
