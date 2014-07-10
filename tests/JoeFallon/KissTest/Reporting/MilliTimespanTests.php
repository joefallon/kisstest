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
use JoeFallon\KissTest\UnitTest;


class MilliTimespanTests extends UnitTest
{
    public function test_elapsed_time_is_always_zero_if_not_started()
    {
        $timespan = new MilliTimespan();
        $expected = 0;
        usleep(100);
        $actual   = $timespan->getElapsedTimeInMilliSec();

        return $this->assertEqual($expected, $actual, "", 0.01);
    }

    
    public function test_elapsed_time_is_positive_if_started()
    {
        $timespan = new MilliTimespan();
        $timespan->startTimer();
        usleep(100);
        $timespan->stopTimer();
        $elapsedTime = $timespan->getElapsedTimeInMilliSec();

        return $this->assertFirstGreaterThanSecond($elapsedTime, 0.0);
    }


    public function test_elapsed_time_is_zero_if_stopped_with_no_start()
    {
        $timespan = new MilliTimespan();
        usleep(100);
        $timespan->stopTimer();
        $expected = 0;
        $actual = $timespan->getElapsedTimeInMilliSec();

        return $this->assertEqual($expected, $actual);
    }


    public function test_elapsed_time_is_positive_if_not_stopped()
    {
        $timespan = new MilliTimespan();
        $timespan->startTimer();
        usleep(100);
        $elapsedTime = $timespan->getElapsedTimeInMilliSec();

        return $this->assertFirstGreaterThanSecond($elapsedTime, 0);
    }

}


