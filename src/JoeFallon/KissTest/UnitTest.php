<?php
namespace JoeFallon\KissTest;

require_once('Reporting/MilliTimespan.php');
require_once('Reporting/Report.php');
require_once('Reporting/Summary.php');
require_once('Reporting/TestCaseResult.php');
require_once('Reporting/UnitTestResult.php');

use Exception;
use JoeFallon\KissTest\Reporting\MilliTimespan;
use JoeFallon\KissTest\Reporting\Report;
use JoeFallon\KissTest\Reporting\Summary;
use JoeFallon\KissTest\Reporting\TestCaseResult;
use JoeFallon\KissTest\Reporting\UnitTestResult;
use PHP_CodeCoverage;
use PHP_CodeCoverage_Filter;
use PHP_CodeCoverage_Report_HTML;

class UnitTest
{
    /** @var string */
    private static $_codeCoverageDirectory;
    private static $_blacklistDirs;
    /** @var string */
    private $_unitTestName;
    /** @var Summary */
    private static $_summary;
    /** @var UnitTestResult */
    private $_unitTestResult;
    /** @var TestCaseResult */
    private $_currentTestCase;
    /** @var int */
    private $_assertCount;
    /** @var bool */
    private static $_codeCoverageEnabled;
    /** @var PHP_CodeCoverage  */
    private static $_codeCoverage;


    public function __construct()
    {
        if(self::$_summary == null)
        {
            self::$_summary = new Summary();
        }

        if(self::$_codeCoverageEnabled && self::$_codeCoverage == null)
        {
            $filter = new PHP_CodeCoverage_Filter();

            if(self::$_blacklistDirs != null)
            {
                foreach(self::$_blacklistDirs as $dir)
                {
                    $filter->addDirectoryToBlacklist($dir);
                }
            }

            self::$_codeCoverage = new PHP_CodeCoverage(null, $filter);
        }

        // Determine the class name.
        $this->_unitTestName   = get_class($this);
        $this->_unitTestResult = new UnitTestResult();
        $this->performAllUnitTests();
    }

    public static function addDirectoryToCoverageBlacklist($dir)
    {
        if(self::$_blacklistDirs == null)
        {
            self::$_blacklistDirs[] = array();
        }

        self::$_blacklistDirs[] = $dir;
    }

    public static function setCodeCoverageEnabled($isEnabled)
    {
        self::$_codeCoverageEnabled = $isEnabled;
    }

    public static function setCodeCoverageOutputDirectory($directory)
    {
        $writable = is_writable($directory);

        if(!$writable)
        {
            $msg = 'The code coverage output directory is not writable.';
            throw new Exception($msg);
        }

        self::$_codeCoverageDirectory = $directory;
    }

    public static function startTimer()
    {
        if(self::$_summary == null)
        {
            self::$_summary = new Summary();
        }
    }


    /**
     * The setUp method is executed before each test method is called and is
     * useful to locate code that should be run before each test.
     */
    protected function setUp() { }


    /**
     * The tearDown method is executed after each test method is called and is
     * useful to locate code that should be run after each test.
     */
    protected function tearDown() { }


    /**
     * This method returns a report of the result of running the unit tests.
     *
     * @return string
     */
    public static function getAllUnitTestsSummary()
    {
        if(self::$_summary == null)
        {
            die('No unit tests exist.');
        }

        $report = new Report(self::$_summary);
        $report->generateReport();

        if(self::$_codeCoverageEnabled)
        {
            $directory = self::$_codeCoverageDirectory;
            $coverage = self::$_codeCoverage;
            $writer = new PHP_CodeCoverage_Report_HTML();
            $writer->process($coverage, $directory);
        }
    }


    /**
     * This method asserts that $first is the same as $second using triple
     * equals (===) equality comparison.
     *
     * @param mixed  $first
     * @param mixed  $second
     * @param string $failMsg
     * @param float  $maxDelta
     *
     * @return bool
     */
    protected function assertEqual($first, $second, $failMsg = "", $maxDelta = 0.0)
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus == false)
        {
            return false;
        }

        if(is_float($first) && is_float($second))
        {
            $delta = abs($second - $first);

            if($delta <= $maxDelta)
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

        $message = '$first = ' . $this->convertValueToString($first)
                   . ', $second = ' . $this->convertValueToString($second)
                   . ', $failMsg = ' . $failMsg;
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }


    /**
     * Assert Not Equal
     *
     * @param mixed  $first
     * @param mixed  $second
     * @param string $failMsg
     *
     * @return bool
     */
    protected function assertNotEqual($first, $second, $failMsg = "")
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus == false)
        {
            return false;
        }


        if($first != $second)
        {
            $this->_currentTestCase->setMessage('');
            $this->_currentTestCase->setTestPassed();

            return true;
        }

        $message = '$first = ' . $this->convertValueToString($first)
                   . ', $second = ' . $this->convertValueToString($second)
                   . ', $failMsg = ' . $failMsg;
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }


    /**
     * Assert First Greater Than Second
     *
     * @param mixed  $first
     * @param mixed  $second
     * @param string $failMsg
     *
     * @return bool
     */
    protected function assertFirstGreaterThanSecond($first, $second, $failMsg = "")
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus == false)
        {
            return false;
        }

        if($first > $second)
        {
            $this->_currentTestCase->setMessage('');
            $this->_currentTestCase->setTestPassed();

            return true;
        }

        $message = '$first = ' . $this->convertValueToString($first)
                   . ', $second = ' . $this->convertValueToString($second)
                   . ', $failMsg = ' . $failMsg;
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }


    /**
     * Assert First Greater Than Or Equal Second
     *
     * @param mixed  $first
     * @param mixed  $second
     * @param string $failMsg
     *
     * @return bool
     */
    protected function assertFirstGreaterThanOrEqualSecond($first, $second, $failMsg = "")
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus == false)
        {
            return false;
        }

        if($first >= $second)
        {
            $this->_currentTestCase->setMessage('');
            $this->_currentTestCase->setTestPassed();

            return true;
        }

        $message = '$first = ' . $this->convertValueToString($first)
                   . ', $second = ' . $this->convertValueToString($second)
                   . ', $failMsg = ' . $failMsg;
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }


    /**
     * Assert First Less Than Second
     *
     * @param mixed  $first
     * @param mixed  $second
     * @param string $failMsg
     *
     * @return bool
     */
    protected function assertFirstLessThanSecond($first, $second, $failMsg = "")
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus == false)
        {
            return false;
        }

        if($first < $second)
        {
            $this->_currentTestCase->setMessage('');
            $this->_currentTestCase->setTestPassed();

            return true;
        }

        $message = '$first = ' . $this->convertValueToString($first)
                   . ', $second = ' . $this->convertValueToString($second)
                   . ', $failMsg = ' . $failMsg;
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }


    /**
     * Assert First Less Than Or Equal Second
     *
     * @param mixed  $first
     * @param mixed  $second
     * @param string $failMsg
     *
     * @return bool
     */
    protected function assertFirstLessThanOrEqualSecond($first, $second, $failMsg = "")
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus == false)
        {
            return false;
        }

        if($first <= $second)
        {
            $this->_currentTestCase->setMessage('');
            $this->_currentTestCase->setTestPassed();

            return true;
        }

        $message = '$first = ' . $this->convertValueToString($first)
                   . ', $second = ' . $this->convertValueToString($second)
                   . ', $failMsg = ' . $failMsg;
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }


    /**
     * Assert False - This assert will fail if the $value provided is not
     * true.
     *
     * @param mixed  $value
     * @param string $failMsg
     *
     * @return bool
     */
    protected function assertTrue($value, $failMsg = "")
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus == false)
        {
            return false;
        }

        if($value == false)
        {
            $message = 'The provided value is false.'
                       . ', $failMsg = ' . $failMsg;
            $this->_currentTestCase->setMessage($message);
            $this->_currentTestCase->setTestFailed();

            return false;
        }

        $this->_currentTestCase->setMessage('');
        $this->_currentTestCase->setTestPassed();

        return true;
    }


    /**
     * Assert False - This assert will fail if the $value provided is not
     * false.
     *
     * @param mixed  $value
     * @param string $failMsg
     *
     * @return bool
     */
    protected function assertFalse($value, $failMsg = "")
    {
        $this->_assertCount++;

        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus == false)
        {
            return false;
        }

        if($value == true)
        {
            $message = 'The provided value is true ($value = '
                       . $this->convertValueToString($value)
                       . ', $failMsg = ' . $failMsg . ').';
            $this->_currentTestCase->setMessage($message);
            $this->_currentTestCase->setTestFailed();

            return false;
        }

        $this->_currentTestCase->setMessage('');
        $this->_currentTestCase->setTestPassed();

        return true;
    }


    /**
     * This method will always cause a test case to fail.
     *
     * @return bool
     */
    protected function notImplementedFail()
    {
        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus == false)
        {
            return false;
        }

        $message = 'This test is not implemented.';
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }


    /**
     * This method will always cause a test case to fail.
     *
     * @param string $message
     *
     * @return bool
     */
    protected function testFail($message = '')
    {
        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus == false)
        {
            return false;
        }

        $message = 'Test fail. ' . $message;
        $this->_currentTestCase->setMessage($message);
        $this->_currentTestCase->setTestFailed();

        return false;
    }


    /**
     * This method will always cause a test case to pass.
     *
     * @return bool
     */
    protected function testPass()
    {
        $currTestStatus = $this->_currentTestCase->getTestStatus();

        if($currTestStatus == false)
        {
            return false;
        }

        $this->_currentTestCase->setMessage('');
        $this->_currentTestCase->setTestPassed();

        return true;
    }


    /**
     * @param $val
     *
     * @return string
     */
    private function convertValueToString($val)
    {
        if(is_array($val) == true)
        {
            return 'Array';
        }

        if(is_object($val) == true)
        {
            return get_class($val);
        }

        return gettype($val) . ":" . strval($val);
    }


    private function performAllUnitTests()
    {
        $this->_unitTestResult->setUnitTestName($this->_unitTestName);
        $testMethods = $this->getTestMethods();

        foreach($testMethods as $method)
        {
            $milliTimespan          = new MilliTimespan();
            $testCase               = new TestCaseResult($milliTimespan);
            $this->_currentTestCase = $testCase;

            $testName = str_replace('_', ' ', $method);
            $testCase->setTestCaseName($testName);

            if(self::$_codeCoverageEnabled)
            {
                self::$_codeCoverage->start($method);
            }

            $this->_assertCount = 0;
            $testCase->startTestCase();
            $this->setUp();
            $this->$method();
            $this->tearDown();
            $testCase->stopTestCase();
            $testCase->setAssertCount($this->_assertCount);

            $this->_unitTestResult->addTestCaseResult($testCase);

            if(self::$_codeCoverageEnabled)
            {
                self::$_codeCoverage->stop();
            }
        }

        $unitTestResult = $this->_unitTestResult;
        self::$_summary->addUnitTestResult($unitTestResult);
    }


    /**
     * @return array
     */
    private function getTestMethods()
    {
        $classMethods = get_class_methods($this);
        $testPrefix   = 'test_';
        $testMethods  = array();

        foreach($classMethods as $method)
        {
            if(stripos($method, $testPrefix, 0) === 0)
            {
                $testMethods[] = $method;
            }
        }

        return $testMethods;
    }
}

