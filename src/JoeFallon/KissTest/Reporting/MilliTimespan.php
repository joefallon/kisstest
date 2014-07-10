<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
namespace JoeFallon\KissTest\Reporting;


class MilliTimespan
{
    const MICROSECS_PER_MILLISEC = 1000.0;

    /** @var float */
    private $_timeStartInMicroSeconds;
    /** @var float */
    private $_timeStopInMicroSeconds;


    public function startTimer()
    {
        $this->_timeStartInMicroSeconds = microtime(true);
    }


    public function stopTimer()
    {
        $this->_timeStopInMicroSeconds = microtime(true);
    }


    /**
     * @return float
     */
    public function getElapsedTimeInMilliSec()
    {
        if(!$this->_timeStartInMicroSeconds)
        {
            return 0;
        }

        $startTime = $this->_timeStartInMicroSeconds;
        $stopTime  = $this->_timeStopInMicroSeconds;

        if($stopTime == 0)
        {
            // The function stopTimer was not called.
            $stopTime = microtime(true);
        }

        $totalMicroSecs = $stopTime - $startTime;
        $totalMilliSecs = $totalMicroSecs * self::MICROSECS_PER_MILLISEC;
        
        return $totalMilliSecs;
    }
}
