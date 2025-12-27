<?php

declare(strict_types=1);

namespace App\Common\Console\Commands;

use App\Common\Console\Commands\Schedules\RunSchedulesCommand;
use App\Common\Enums\ScheduleFrequency;

final class RunCustomSchedulesCommand extends RunSchedulesCommand
{
    protected $signature = 'scheduler:custom';

    protected $description = 'Trigger all active custom (cron-based) schedules now.';

    protected function frequency(): ScheduleFrequency
    {
        return ScheduleFrequency::CUSTOM;
    }
}
