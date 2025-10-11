<?php
/** @noinspection PhpMissingParentCallCommonInspection */
declare(strict_types=1);

namespace Tests\JoeFallon\KissTest\Reporting;

use JoeFallon\KissTest\Reporting\MilliTimespan;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class MilliTimespanMock extends MilliTimespan
{
    public bool $startTimerCalled = false;
    public bool $stopTimerCalled  = false;

    public function startTimer(): void
    {
        $this->startTimerCalled = true;
    }

    public function stopTimer(): void
    {
        $this->stopTimerCalled = true;
    }

    public function getElapsedTimeInMilliSec(): float
    {
        return 2.0;
    }
}
