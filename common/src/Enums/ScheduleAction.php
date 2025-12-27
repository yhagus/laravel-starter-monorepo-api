<?php

declare(strict_types=1);

namespace App\Common\Enums;

enum ScheduleAction: string
{
    case OTHER = 'OTHER';

    /**
     * Get options
     *
     * @return array<mixed>
     */
    public static function options(): array
    {
        return array_map(
            fn (self $case): array => [
                'label' => $case->label(),
                'value' => $case->value,
            ],
            self::cases()
        );
    }

    public function label(): string
    {
        return match ($this) {
            self::OTHER => 'Other',
        };
    }
}
