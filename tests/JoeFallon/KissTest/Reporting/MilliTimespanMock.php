<?php
/** @noinspection PhpMissingParentCallCommonInspection */
declare(strict_types=1);

namespace tests\JoeFallon\KissTest\Reporting;

use JoeFallon\KissTest\Reporting\MilliTimespan;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class MilliTimespanMock extends MilliTimespan
{
    public bool $_startTimerCalled;
    public bool $_stopTimerCalled;


    public function startTimer(): void
    {
        $this->_startTimerCalled = true;
    }

    public function stopTimer(): void
    {
        $this->_stopTimerCalled = true;
    }

    public function getElapsedTimeInMilliSec(): float
    {
        return 2.0;
    }
}
