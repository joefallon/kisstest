<?php
declare(strict_types=1);

namespace tests\JoeFallon\KissTest\Reporting;

use JoeFallon\KissTest\Reporting\Summary;
use JoeFallon\KissTest\Reporting\TestCaseResult;
use JoeFallon\KissTest\Reporting\UnitTestResult;
use JoeFallon\KissTest\UnitTest;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class SummaryTests extends UnitTest
{
    public function test_adding_unittest_result_returns_correct_count()
    {
        /** @noinspection DuplicatedCode */
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

        $this->assertEqual($expected, $actual);
    }


    public function test_correct_tests_passed_count_returned()
    {
        /** @noinspection DuplicatedCode */
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

        $this->assertEqual($expected, $actual);
    }


    public function test_correct_tests_failed_count_returned()
    {
        /** @noinspection DuplicatedCode */
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

        $this->assertEqual($expected, $actual);
    }


    public function test_test_cases_count_is_correct()
    {
        /** @noinspection DuplicatedCode */
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

        $this->assertEqual($expected, $actual);
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

        $this->assertFirstGreaterThanSecond($time, 0);
    }


    public function test_correct_percentage_passed()
    {
        /** @noinspection DuplicatedCode */
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

        $this->assertEqual($expected, $actual, "", 0.01);
    }


    public function test_correct_percentage_failed()
    {
        /** @noinspection DuplicatedCode */
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

        $this->assertEqual($expected, $actual, "", 0.001);
    }
}
