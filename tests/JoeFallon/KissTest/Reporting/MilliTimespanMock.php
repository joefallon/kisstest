<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
namespace tests\JoeFallon\KissTest\Reporting;

use JoeFallon\KissTest\Reporting\MilliTimespan;

class MilliTimespanMock extends MilliTimespan
{
    public $_startTimerCalled;
    public $_stopTimerCalled;


    public function startTimer()
    {
        $this->_startTimerCalled = true;
    }

    public function stopTimer()
    {
        $this->_stopTimerCalled = true;
    }

    public function getElapsedTimeInMilliSec()
    {
        return 2.0;
    }
}
