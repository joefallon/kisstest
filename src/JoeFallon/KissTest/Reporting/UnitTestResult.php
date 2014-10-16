<?php
namespace JoeFallon\KissTest\Reporting;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class UnitTestResult
{
    /**  @var string */
    private $_unitTestName;
    /** @var array */
    private $_testCaseResults;


    public function __construct()
    {
        $this->_testCaseResults = array();
    }


    /**
     * @return int
     */
    public function getAssertCount()
    {
        $sum = 0;

        foreach($this->_testCaseResults as $result)
        {
            /* @var $result TestCaseResult   */
            $sum += $result->getAssertCount();
        }

        return $sum;
    }


    /**
     * @return string
     */
    public function getUnitTestName()
    {
        return $this->_unitTestName;
    }


    /**
     * @param string $name
     */
    public function setUnitTestName($name)
    {
        $this->_unitTestName = strval($name);
    }


    /**
     * @param TestCaseResult $testCaseResult
     */
    public function addTestCaseResult(TestCaseResult $testCaseResult)
    {
        $this->_testCaseResults[] = $testCaseResult;
    }


    /**
     * @return int
     */
    public function getTestCaseCount()
    {
        return count($this->_testCaseResults);
    }


    /**
     * @return float
     */
    public function getExecutionTimeInMillisecs()
    {
        $sum = 0;

        foreach($this->_testCaseResults as $result)
        {
            /* @var $result TestCaseResult   */
            $sum += $result->getExecutionTimeInMillisecs();
        }

        return $sum;
    }


    /**
     * @return int
     */
    public function getNumberTestCasesPass()
    {
        $sum = 0;

        foreach($this->_testCaseResults as $result)
        {
            /* @var $result TestCaseResult */
            if($result->getTestStatus())
            {
                $sum++;
            }
        }

        return $sum;
    }


    /**
     * @return int
     */
    public function getNumberTestCasesFailed()
    {
        $fails = $this->getTestCaseCount() - $this->getNumberTestCasesPass();
        
        return $fails;
    }


    /**
     * @return float
     */
    public function getPercentagePassed()
    {
        $total  = $this->getTestCaseCount();
        $total  = floatval($total);

        $passed = $this->getNumberTestCasesPass();
        $passed = floatval($passed);

        $percentPassed = ( $passed / $total ) * 100;

        return $percentPassed;
    }


    /**
     * @return float
     */
    public function getPercentageFailed()
    {
        return (100.0 - $this->getPercentagePassed());
    }


    /**
     * @return array
     */
    public function getTestCaseResults()
    {
        return $this->_testCaseResults;
    }
}
