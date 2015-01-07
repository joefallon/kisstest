<?php
namespace JoeFallon\KissTest\Reporting;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class Summary
{
    /** @var array */
    private $_unitTestResults;
    /** @var MilliTimespan */
    private static $_timer;


    public function __construct()
    {
        $this->_unitTestResults = array();
        self::$_timer = new MilliTimespan();
        self::$_timer->startTimer();
    }


    /**
     * @return int
     */
    public function getUnitTestCount()
    {
        return count($this->_unitTestResults);
    }


    /**
     * @param UnitTestResult
     */
    public function addUnitTestResult(UnitTestResult $unitTestResult)
    {
        $this->_unitTestResults[] = $unitTestResult;
    }


    /**
     * @return string
     */
    public function getNumberOfAsserts()
    {
        $total = 0;

        foreach($this->_unitTestResults as $result)
        {
            /* @var $result UnitTestResult */
            $total += $result->getAssertCount();
        }

        return number_format($total);
    }


    /**
     * @return integer
     */
    public function getTestCasesCount()
    {
        $total = 0;

        foreach($this->_unitTestResults as $result)
        {
            /* @var $result UnitTestResult */
            $total += $result->getTestCaseCount();
        }

        return $total;
    }


    /**
     * @return integer
     */
    public function getTestCasesPassedCount()
    {
        $totalPassed = 0;

        foreach($this->_unitTestResults as $result)
        {
            /* @var $result UnitTestResult */
            $totalPassed += $result->getNumberTestCasesPass();
        }

        return $totalPassed;
    }


    /**
     * @return integer
     */
    public function getTestCasesFailedCount()
    {
        $total  = $this->getTestCasesCount();
        $passed = $this->getTestCasesPassedCount();

        return $total - $passed;
    }


    /**
     * @return float
     */
    public function getExecutionTimeInMillisecs()
    {
        self::$_timer->stopTimer();
        $totalTime = self::$_timer->getElapsedTimeInMilliSec();
        
        return $totalTime;
    }


    /**
     * @return float
     */
    public function getPercentagePassed()
    {
        $total = $this->getTestCasesCount();
        $total = floatval($total);
        
        if($total == 0)
        {
            return 100.0;
        }

        $passed        = $this->getTestCasesPassedCount();
        $passed        = floatval($passed);
        $percentPassed = ( $passed/$total ) * 100.0;

        return $percentPassed;
    }

    /**
     * @return float
     */
    public function getPercentageFailed()
    {
        return 100.0 - $this->getPercentagePassed();
    }


    /**
     * @return array
     */
    public function getUnitTestsResults()
    {
        return $this->_unitTestResults;
    }
}
