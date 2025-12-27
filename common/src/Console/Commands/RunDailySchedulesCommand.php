<?php

declare(strict_types=1);

namespace App\Common\Console\Commands;

use App\Common\Console\Commands\Schedules\RunSchedulesCommand;
use App\Common\Enums\ScheduleFrequency;

final class RunDailySchedulesCommand extends RunSchedulesCommand
{
    protected $signature = 'scheduler:daily';

    protected $description = 'Trigger all active daily schedules now.';

    protected function frequency(): ScheduleFrequency
    {
        return ScheduleFrequency::DAILY;
    }
}
