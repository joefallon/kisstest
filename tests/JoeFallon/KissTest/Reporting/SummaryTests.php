<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
namespace tests\JoeFallon\KissTest\Reporting;

use JoeFallon\KissTest\Reporting\Summary;
use JoeFallon\KissTest\Reporting\TestCaseResult;
use JoeFallon\KissTest\Reporting\UnitTestResult;
use JoeFallon\KissTest\UnitTest;


class SummaryTests extends UnitTest
{
    public function test_adding_unittest_result_returns_correct_count()
    {
        $unitTestResult     = new UnitTestResult();
        $milliTimespanMock1 = new MilliTimespanMock();
        $testCaseResult1    = new TestCaseResult($milliTimespanMock1);
        $testCaseResult1->startTestCase();
        $testCaseResult1->stopTestCase();
        $testCaseResult1->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult1);

        $milliTimespanMock2 = new MilliTimespanMock();
        $testCaseResult2    = new TestCaseResult($milliTimespanMock2);
        $testCaseResult2->startTestCase();
        $testCaseResult2->stopTestCase();
        $testCaseResult2->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult2);

        $milliTimespanMock3 = new MilliTimespanMock();
        $testCaseResult3    = new TestCaseResult($milliTimespanMock3);
        $testCaseResult3->startTestCase();
        $testCaseResult3->stopTestCase();
        $testCaseResult3->setTestFailed();

        $unitTestResult->addTestCaseResult($testCaseResult3);

        $summary = new Summary();
        $summary->addUnitTestResult($unitTestResult);

        $expected = 1;
        $actual   = $summary->getUnitTestCount();

        return $this->assertEqual($expected, $actual);
    }


    public function test_correct_tests_passed_count_returned()
    {
        $unitTestResult     = new UnitTestResult();
        $milliTimespanMock1 = new MilliTimespanMock();
        $testCaseResult1    = new TestCaseResult($milliTimespanMock1);
        $testCaseResult1->startTestCase();
        $testCaseResult1->stopTestCase();
        $testCaseResult1->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult1);

        $milliTimespanMock2 = new MilliTimespanMock();
        $testCaseResult2    = new TestCaseResult($milliTimespanMock2);
        $testCaseResult2->startTestCase();
        $testCaseResult2->stopTestCase();
        $testCaseResult2->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult2);

        $milliTimespanMock3 = new MilliTimespanMock();
        $testCaseResult3    = new TestCaseResult($milliTimespanMock3);
        $testCaseResult3->startTestCase();
        $testCaseResult3->stopTestCase();
        $testCaseResult3->setTestFailed();

        $unitTestResult->addTestCaseResult($testCaseResult3);

        $summary = new Summary();
        $summary->addUnitTestResult($unitTestResult);

        $expected = 2;
        $actual   = $summary->getTestCasesPassedCount();

        return $this->assertEqual($expected, $actual);
    }


    public function test_correct_tests_failed_count_returned()
    {
        $unitTestResult     = new UnitTestResult();
        $milliTimespanMock1 = new MilliTimespanMock();
        $testCaseResult1    = new TestCaseResult($milliTimespanMock1);
        $testCaseResult1->startTestCase();
        $testCaseResult1->stopTestCase();
        $testCaseResult1->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult1);

        $milliTimespanMock2 = new MilliTimespanMock();
        $testCaseResult2    = new TestCaseResult($milliTimespanMock2);
        $testCaseResult2->startTestCase();
        $testCaseResult2->stopTestCase();
        $testCaseResult2->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult2);

        $milliTimespanMock3 = new MilliTimespanMock();
        $testCaseResult3    = new TestCaseResult($milliTimespanMock3);
        $testCaseResult3->startTestCase();
        $testCaseResult3->stopTestCase();
        $testCaseResult3->setTestFailed();

        $unitTestResult->addTestCaseResult($testCaseResult3);

        $summary = new Summary();
        $summary->addUnitTestResult($unitTestResult);

        $expected = 1;
        $actual   = $summary->getTestCasesFailedCount();

        return $this->assertEqual($expected, $actual);
    }


    public function test_test_cases_count_is_correct()
    {
        $unitTestResult     = new UnitTestResult();
        $milliTimespanMock1 = new MilliTimespanMock();
        $testCaseResult1    = new TestCaseResult($milliTimespanMock1);
        $testCaseResult1->startTestCase();
        $testCaseResult1->stopTestCase();
        $testCaseResult1->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult1);

        $milliTimespanMock2 = new MilliTimespanMock();
        $testCaseResult2    = new TestCaseResult($milliTimespanMock2);
        $testCaseResult2->startTestCase();
        $testCaseResult2->stopTestCase();
        $testCaseResult2->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult2);

        $milliTimespanMock3 = new MilliTimespanMock();
        $testCaseResult3    = new TestCaseResult($milliTimespanMock3);
        $testCaseResult3->startTestCase();
        $testCaseResult3->stopTestCase();
        $testCaseResult3->setTestFailed();

        $unitTestResult->addTestCaseResult($testCaseResult3);

        $summary = new Summary();
        $summary->addUnitTestResult($unitTestResult);

        $expected = 3;
        $actual   = $summary->getTestCasesCount();

        return $this->assertEqual($expected, $actual);
    }


    public function test_correct_execution_time_is_returned()
    {
        $unitTestResult = new UnitTestResult();

        $milliTimespanMock1 = new MilliTimespanMock();
        $testCaseResult1    = new TestCaseResult($milliTimespanMock1);
        $testCaseResult1->startTestCase();
        usleep(500);
        $testCaseResult1->stopTestCase();
        $testCaseResult1->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult1);

        $milliTimespanMock2 = new MilliTimespanMock();
        $testCaseResult2    = new TestCaseResult($milliTimespanMock2);
        $testCaseResult2->startTestCase();
        usleep(500);
        $testCaseResult2->stopTestCase();
        $testCaseResult2->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult2);

        $milliTimespanMock3 = new MilliTimespanMock();
        $testCaseResult3    = new TestCaseResult($milliTimespanMock3);
        $testCaseResult3->startTestCase();
        usleep(500);
        $testCaseResult3->stopTestCase();
        $testCaseResult3->setTestFailed();

        $unitTestResult->addTestCaseResult($testCaseResult3);

        $summary = new Summary();
        $summary->addUnitTestResult($unitTestResult);

        $time = $summary->getExecutionTimeInMillisecs();

        return $this->assertFirstGreaterThanSecond($time, 0);
    }


    public function test_correct_percentage_passed()
    {
        $unitTestResult = new UnitTestResult();

        $milliTimespanMock1 = new MilliTimespanMock();
        $testCaseResult1    = new TestCaseResult($milliTimespanMock1);
        $testCaseResult1->startTestCase();
        $testCaseResult1->stopTestCase();
        $testCaseResult1->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult1);

        $milliTimespanMock2 = new MilliTimespanMock();
        $testCaseResult2    = new TestCaseResult($milliTimespanMock2);
        $testCaseResult2->startTestCase();
        $testCaseResult2->stopTestCase();
        $testCaseResult2->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult2);

        $milliTimespanMock3 = new MilliTimespanMock();
        $testCaseResult3    = new TestCaseResult($milliTimespanMock3);
        $testCaseResult3->startTestCase();
        $testCaseResult3->stopTestCase();
        $testCaseResult3->setTestFailed();

        $unitTestResult->addTestCaseResult($testCaseResult3);

        $summary = new Summary();
        $summary->addUnitTestResult($unitTestResult);

        $expected = 66.66666;
        $actual   = $summary->getPercentagePassed();

        return $this->assertEqual($expected, $actual, "", 0.01);
    }


    public function test_correct_percentage_failed()
    {
        $unitTestResult     = new UnitTestResult();
        $milliTimespanMock1 = new MilliTimespanMock();
        $testCaseResult1    = new TestCaseResult($milliTimespanMock1);
        $testCaseResult1->startTestCase();
        $testCaseResult1->stopTestCase();
        $testCaseResult1->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult1);

        $milliTimespanMock2 = new MilliTimespanMock();
        $testCaseResult2    = new TestCaseResult($milliTimespanMock2);
        $testCaseResult2->startTestCase();
        $testCaseResult2->stopTestCase();
        $testCaseResult2->setTestPassed();

        $unitTestResult->addTestCaseResult($testCaseResult2);

        $milliTimespanMock3 = new MilliTimespanMock();
        $testCaseResult3    = new TestCaseResult($milliTimespanMock3);
        $testCaseResult3->startTestCase();
        $testCaseResult3->stopTestCase();
        $testCaseResult3->setTestFailed();

        $unitTestResult->addTestCaseResult($testCaseResult3);

        $summary = new Summary();
        $summary->addUnitTestResult($unitTestResult);

        $expected = 33.3333;
        $actual   = $summary->getPercentageFailed();

        return $this->assertEqual($expected, $actual, "", 0.001);
    }
}
