<?php

declare(strict_types=1);

namespace App\Common\Models;

use Database\Factories\MediaFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

final class Media extends BaseMedia
{
    /**
     * @use HasFactory<MediaFactory>
     */
    use HasFactory, HasUuids;

    public $incrementing = false;

    protected $keyType = 'string';
}
