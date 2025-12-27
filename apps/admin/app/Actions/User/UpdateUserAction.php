<?php

declare(strict_types=1);

namespace App\Admin\Actions\User;

use Illuminate\Support\Facades\DB;

final readonly class UpdateUserAction
{
    /**
     * Execute the action.
     */
    public function handle(): void
    {
        DB::transaction(function (): void {
            //
        });
    }
}
