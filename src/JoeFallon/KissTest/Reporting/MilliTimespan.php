<?php declare(strict_types=1);

namespace JoeFallon\KissTest\Reporting;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2025 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class MilliTimespan
{
    public const MICROSECS_PER_MILLISEC = 1000.0;

    private float $_timeStartInMicroSeconds = 0.0;
    private float $_timeStopInMicroSeconds  = 0.0;

    public function startTimer(): void
    {
        $this->_timeStartInMicroSeconds = microtime(true);
    }

    public function stopTimer(): void
    {
        $this->_timeStopInMicroSeconds = microtime(true);
    }

    public function getElapsedTimeInMilliSec(): float
    {
        if($this->_timeStartInMicroSeconds == 0.0)
        {
            return 0.0;
        }

        $startTime = $this->_timeStartInMicroSeconds;
        $stopTime = $this->_timeStopInMicroSeconds;

        if($stopTime === 0.0)
        {
            // The function stopTimer was not called.
            $stopTime = microtime(true);
        }

        $totalMicroSecs = $stopTime - $startTime;
        $totalMilliSecs = $totalMicroSecs * self::MICROSECS_PER_MILLISEC;

        return $totalMilliSecs;
    }
}
