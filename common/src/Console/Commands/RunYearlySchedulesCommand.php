<?php

declare(strict_types=1);

namespace App\Common\Console\Commands;

use App\Common\Console\Commands\Schedules\RunSchedulesCommand;
use App\Common\Enums\ScheduleFrequency;

final class RunYearlySchedulesCommand extends RunSchedulesCommand
{
    protected $signature = 'scheduler:yearly';

    protected $description = 'Trigger all active yearly schedules now.';

    protected function frequency(): ScheduleFrequency
    {
        return ScheduleFrequency::YEARLY;
    }
}
