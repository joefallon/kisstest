<?php
declare(strict_types=1);

namespace JoeFallon\KissTest;

use JoeFallon\KissTest\Reporting\MilliTimespan;
use JoeFallon\KissTest\Reporting\Report;
use JoeFallon\KissTest\Reporting\Summary;
use JoeFallon\KissTest\Reporting\TestCaseResult;
use JoeFallon\KissTest\Reporting\UnitTestResult;

/**
 * Base class for unit tests in the KissTest framework.
 * Provides assertion methods and manages test execution lifecycle.
 */
class UnitTest
{
    private string $_unitTestName;
    private static ?Summary $_summary = null;
    private UnitTestResult $_unitTestResult;
    private TestCaseResult $_currentTestCase;
    private int $_assertCount = 0;

    public function __construct()
    {
        if(self::$_summary === null)
        {
            self::$_summary = new Summary();
        }

        $this->_unitTestName   = get_class($this);
        $this->_unitTestResult = new UnitTestResult();
        $this->performAllUnitTests();
    }

    public static function startTimer(): void
    {
        if(self::$_summary === null)
        {
            self::$_summary = new Summary();
        }
    }

    protected function setUp(): void { }
    protected function tearDown(): void { }

    public static function getAllUnitTestsSummary(): void
    {
        if(self::$_summary === null)
        {
            die('No unit tests exist. Please create some unit tests.');
        }

        $report = new Report(self::$_summary);
        $report->generateReport();
    }

    /**
     * Asserts that two values are equal, with optional delta for floats.
     * @param mixed $first
     * @param mixed $second
     * @param string $failMessage
     * @param float $maximumDelta
     * @return bool
     */
    protected function assertEqual($first, $second, string $failMessage = "", float $maximumDelta = 0.0): bool
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus === false)
        {
            return false;
        }

        if(is_float($first) && is_float($second))
        {
            $delta = abs($second - $first);

            if($delta <= $maximumDelta)
            {
                $this->_currentTestCase->setMessage('');
                $this->_currentTestCase->setTestPassed();

                return true;
            }
        }

        if($first === $second)
        {
            $this->_currentTestCase->setMessage('');
            $this->_currentTestCase->setTestPassed();

            return true;
        }

        $message = $this->getFailureResultInfo($first, $second, $failMessage);
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }

    /**
     * Asserts that two values are not equal.
     * @param mixed $first
     * @param mixed $second
     * @param string $failMessage
     * @return bool
     */
    protected function assertNotEqual($first, $second, string $failMessage = ""): bool
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus === false)
        {
            return false;
        }

        if($first != $second)
        {
            $this->_currentTestCase->setMessage('');
            $this->_currentTestCase->setTestPassed();

            return true;
        }

        $message = $this->getFailureResultInfo($first, $second, $failMessage);
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }

    /**
     * Asserts that the first value is greater than the second.
     * @param mixed $first
     * @param mixed $second
     * @param string $failMessage
     * @return bool
     */
    protected function assertFirstGreaterThanSecond($first, $second, string $failMessage = ""): bool
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus === false)
        {
            return false;
        }

        if($first > $second)
        {
            $this->_currentTestCase->setMessage('');
            $this->_currentTestCase->setTestPassed();

            return true;
        }

        $message = $this->getFailureResultInfo($first, $second, $failMessage);
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }

    /**
     * Asserts that the first value is greater than or equal to the second.
     * @param mixed $first
     * @param mixed $second
     * @param string $failMessage
     * @return bool
     */
    protected function assertFirstGreaterThanOrEqualSecond($first, $second, string $failMessage = ""): bool
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus === false)
        {
            return false;
        }

        if($first >= $second)
        {
            $this->_currentTestCase->setMessage('');
            $this->_currentTestCase->setTestPassed();

            return true;
        }

        $message = $this->getFailureResultInfo($first, $second, $failMessage);
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }

    /**
     * Asserts that the first value is less than the second.
     * @param mixed $first
     * @param mixed $second
     * @param string $failMessage
     * @return bool
     */
    protected function assertFirstLessThanSecond($first, $second, string $failMessage = ""): bool
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus === false)
        {
            return false;
        }

        if($first < $second)
        {
            $this->_currentTestCase->setMessage('');
            $this->_currentTestCase->setTestPassed();

            return true;
        }

        $message = $this->getFailureResultInfo($first, $second, $failMessage);
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }

    /**
     * Asserts that the first value is less than or equal to the second.
     * @param mixed $first
     * @param mixed $second
     * @param string $failMessage
     * @return bool
     */
    protected function assertFirstLessThanOrEqualSecond($first, $second, string $failMessage = ""): bool
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus === false)
        {
            return false;
        }

        if($first <= $second)
        {
            $this->_currentTestCase->setMessage('');
            $this->_currentTestCase->setTestPassed();

            return true;
        }

        $message = $this->getFailureResultInfo($first, $second, $failMessage);
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }

    /**
     * Asserts that the value is true.
     * @param mixed $value
     * @param string $failMessage
     * @return bool
     */
    protected function assertTrue($value, string $failMessage = ""): bool
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus === false)
        {
            return false;
        }

        if(!$value)
        {
            $message = 'The provided value is false.'
                       . ', $failMessage = ' . $failMessage;
            $this->_currentTestCase->setMessage($message);
            $this->_currentTestCase->setTestFailed();

            return false;
        }

        $this->_currentTestCase->setMessage('');
        $this->_currentTestCase->setTestPassed();

        return true;
    }

    /**
     * Asserts that the value is false.
     * @param mixed $value
     * @param string $failMessage
     * @return bool
     */
    protected function assertFalse($value, string $failMessage = ""): bool
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus === false)
        {
            return false;
        }

        if($value)
        {
            $message = 'The provided value is true ($value = '
                       . $this->convertValueToString($value)
                       . ', $failMessage = ' . $failMessage . ').';
            $this->_currentTestCase->setMessage($message);
            $this->_currentTestCase->setTestFailed();

            return false;
        }

        $this->_currentTestCase->setMessage('');
        $this->_currentTestCase->setTestPassed();

        return true;
    }

    /**
     * Marks a test as not implemented and fails it.
     * @return bool
     */
    protected function notImplementedFail(): bool
    {
        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus === false)
        {
            return false;
        }

        $message = 'This test is not implemented.';
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }

    /**
     * Marks a test as failed with a message.
     * @param string $message
     * @return bool
     */
    protected function testFail(string $message = ''): bool
    {
        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus === false)
        {
            return false;
        }

        $message = 'Test fail. ' . $message;
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }

    /**
     * Marks a test as passed.
     * @return bool
     */
    protected function testPass(): bool
    {
        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus === false)
        {
            return false;
        }

        $this->_currentTestCase->setMessage('');
        $this->_currentTestCase->setTestPassed();

        return true;
    }

    /**
     * Returns a formatted failure message for assertions.
     * @param mixed $first
     * @param mixed $second
     * @param string $failMessage
     * @return string
     */
    protected function getFailureResultInfo($first, $second, string $failMessage): string
    {
        $first  = $this->convertValueToString($first);
        $second = $this->convertValueToString($second);

        $message = '$first = ' . $first
                   . ', $second = ' . $second
                   . ', $failMessage = ' . $failMessage;

        return $message;
    }

    /**
     * Converts a value to a string for reporting.
     * @param mixed $val
     * @return string
     */
    private function convertValueToString($val): string
    {
        if(is_array($val))
        {
            return 'Array';
        }

        if(is_object($val))
        {
            return get_class($val);
        }

        return gettype($val) . ":" . strval($val);
    }

    /**
     * Runs all test methods in the class.
     * @return void
     */
    private function performAllUnitTests(): void
    {
        $this->_unitTestResult->setUnitTestName($this->_unitTestName);
        $testMethods = $this->getTestMethods();

        foreach($testMethods as $method)
        {
            $milliTimespan = new MilliTimespan();
            $testCase      = new TestCaseResult($milliTimespan);
            $this->_currentTestCase = $testCase;

            $testName = str_replace('_', ' ', $method);
            $testCase->setTestCaseName($testName);
            $this->_assertCount = 0;
            $testCase->startTestCase();
            $this->setUp();
            $this->$method();
            $this->tearDown();
            $testCase->stopTestCase();
            $testCase->setAssertCount($this->_assertCount);
            $this->_unitTestResult->addTestCaseResult($testCase);
        }

        $unitTestResult = $this->_unitTestResult;
        self::$_summary->addUnitTestResult($unitTestResult);
    }

    /**
     * Returns all test methods in the class.
     * @return array
     */
    private function getTestMethods(): array
    {
        $classMethods = get_class_methods($this);
        $testPrefix   = 'test_';
        $testMethods  = [];

        foreach($classMethods as $method)
        {
            if(stripos($method, $testPrefix) === 0)
            {
                $testMethods[] = $method;
            }
        }

        return $testMethods;
    }
}
