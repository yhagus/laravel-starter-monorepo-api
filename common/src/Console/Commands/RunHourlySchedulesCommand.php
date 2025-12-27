<?php

declare(strict_types=1);

namespace App\Common\Console\Commands;

use App\Common\Console\Commands\Schedules\RunSchedulesCommand;
use App\Common\Enums\ScheduleFrequency;

final class RunHourlySchedulesCommand extends RunSchedulesCommand
{
    protected $signature = 'scheduler:hourly';

    protected $description = 'Trigger all active hourly schedules now.';

    protected function frequency(): ScheduleFrequency
    {
        return ScheduleFrequency::HOURLY;
    }
}
