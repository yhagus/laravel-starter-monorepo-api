<?php

declare(strict_types=1);

namespace App\Common\Console\Commands;

use App\Common\Console\Commands\Schedules\RunSchedulesCommand;
use App\Common\Enums\ScheduleFrequency;

final class RunWeeklySchedulesCommand extends RunSchedulesCommand
{
    protected $signature = 'scheduler:weekly';

    protected $description = 'Trigger all active weekly schedules now.';

    protected function frequency(): ScheduleFrequency
    {
        return ScheduleFrequency::WEEKLY;
    }
}
