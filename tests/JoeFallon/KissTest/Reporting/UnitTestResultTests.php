<?php
namespace tests\JoeFallon\KissTest\Reporting;

use JoeFallon\KissTest\Reporting\TestCaseResult;
use JoeFallon\KissTest\Reporting\UnitTestResult;
use JoeFallon\KissTest\UnitTest;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */

class UnitTestResultTests extends UnitTest
{
    public function test_adding_test_case_result_increases_count()
    {
        $unitTestResult    = new UnitTestResult();
        $milliTimespanMock = new MilliTimespanMock();
        $testCaseResult    = new TestCaseResult($milliTimespanMock);
        $unitTestResult->addTestCaseResult($testCaseResult);
        $expected = 1;
        $actual   = $unitTestResult->getTestCaseCount();

        return $this->assertEqual($expected, $actual);

    }


    public function test_execution_time_is_correct()
    {
        $unitTestResult     = new UnitTestResult();
        $milliTimespanMock1 = new MilliTimespanMock();
        $testCaseResult1    = new TestCaseResult($milliTimespanMock1);
        $testCaseResult1->startTestCase();
        $testCaseResult1->stopTestCase();

        $unitTestResult->addTestCaseResult($testCaseResult1);

        $milliTimespanMock2 = new MilliTimespanMock();
        $testCaseResult2    = new TestCaseResult($milliTimespanMock2);
        $testCaseResult2->startTestCase();
        $testCaseResult2->stopTestCase();

        $unitTestResult->addTestCaseResult($testCaseResult2);

        $expected = 4.0;
        $actual   = $unitTestResult->getExecutionTimeInMillisecs();

        return $this->assertEqual($expected, $actual, "", 0.001);

    }


    public function test_correct_test_passes_calculated()
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

        $expected = 2;
        $actual   = $unitTestResult->getNumberTestCasesPass();

        return $this->assertEqual($expected, $actual);

    }


    public function test_correct_test_fails_calculated()
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

        $expected = 1;
        $actual   = $unitTestResult->getNumberTestCasesFailed();

        return $this->assertEqual($expected, $actual);
    }


    public function test_correct_test_passed_percentage_calculated()
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

        $expected = 66.6666;
        $actual   = $unitTestResult->getPercentagePassed();

        return $this->assertEqual($expected, $actual, "", 0.01);
    }


    public function test_correct_test_failed_percentage_calculated()
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

        $expected = 33.33333;
        $actual   = $unitTestResult->getPercentageFailed();

        return $this->assertEqual($expected, $actual, "", 0.01);
    }
}
