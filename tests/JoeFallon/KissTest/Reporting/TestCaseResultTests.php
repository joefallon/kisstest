<?php
namespace tests\JoeFallon\KissTest\Reporting;

use JoeFallon\KissTest\Reporting\TestCaseResult;
use JoeFallon\KissTest\UnitTest;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class TestCaseResultTests extends UnitTest
{
    public function test_execution_time_always_greater_than_or_equal_to_zero()
    {
        $milliTimespanMock = new MilliTimespanMock();
        $testCaseResult    = new TestCaseResult($milliTimespanMock);
        $time              = $testCaseResult->getExecutionTimeInMillisecs();

        return $this->assertFirstGreaterThanOrEqualSecond($time, 0);
    }


    public function test_elapsed_time_is_valid_for_normal_operation()
    {
        $milliTimespanMock = new MilliTimespanMock();
        $testCaseResult    = new TestCaseResult($milliTimespanMock);
        $testCaseResult->startTestCase();
        $testCaseResult->stopTestCase();
        $elapsedTime       = $testCaseResult->getExecutionTimeInMillisecs();
        
        return $this->assertFirstGreaterThanSecond($elapsedTime, 0);
    }


    public function test_can_start_timer()
    {
        $milliTimespanMock = new MilliTimespanMock();
        $testCaseResult    = new TestCaseResult($milliTimespanMock);
        $testCaseResult->startTestCase();
        $testCaseResult->stopTestCase();
        $elapsedTime       = $testCaseResult->getExecutionTimeInMillisecs();

        return $this->assertTrue($milliTimespanMock->_startTimerCalled);
    }

    
    public function test_can_stop_timer()
    {
        $milliTimespanMock = new MilliTimespanMock();
        $testCaseResult    = new TestCaseResult($milliTimespanMock);
        $testCaseResult->startTestCase();
        $testCaseResult->stopTestCase();
        $elapsedTime       = $testCaseResult->getExecutionTimeInMillisecs();

        return $this->assertTrue($milliTimespanMock->_stopTimerCalled);
    }

}
