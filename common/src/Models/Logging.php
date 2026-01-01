<?php

declare(strict_types=1);

namespace App\Common\Models;

use App\Common\Traits\HasQueryPagination;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Models\Activity;

final class Logging extends Activity
{
    /**
     * @use HasQueryPagination<$this>
     */
    use HasFactory, HasQueryPagination, HasUuids;

    public $incrementing = false;

    protected $keyType = 'string';

    protected function casts(): array
    {
        return [
            'causer_id' => 'string',
            'subject_id' => 'string',
        ];
    }
}
