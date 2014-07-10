<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
namespace JoeFallon\KissTest\Reporting;


class TestCaseResult
{
    /** @var float */
    private $_executionTimeInMillisecs;
    /** @var boolean */
    private $_testPassed;
    /** @var string */
    private $_message;
    /** @var MilliTimespan */
    private $_milliTimespan;
    /** @var string */
    private $_testCaseName;
    /** @var int */
    private $_assertCount;


    /**
     * @param MilliTimespan $milliTimespan
     */
    public function __construct(MilliTimespan $milliTimespan)
    {
        $this->_milliTimespan = $milliTimespan;
        $this->_testPassed    = true;
    }


    public function startTestCase()
    {
        $this->_milliTimespan->startTimer();
    }


    /**
     * @return int
     */
    public function getAssertCount()
    {
        return $this->_assertCount;
    }


    /**
     * @param $count
     */
    public function setAssertCount($count)
    {
        $this->_assertCount = intval($count);
    }


    public function stopTestCase()
    {
        $milliTimespan = $this->_milliTimespan;
        $milliTimespan->stopTimer();
        $elapsed = $milliTimespan->getElapsedTimeInMilliSec();
        $this->_executionTimeInMillisecs = $elapsed;
    }


    /**
     * @return float
     */
    public function getExecutionTimeInMillisecs()
    {
        if($this->_executionTimeInMillisecs > 0)
        {
            return $this->_executionTimeInMillisecs;
        }
        else
        {
            return 0;
        }
    }


    public function setTestPassed()
    {
        $this->_testPassed = true;
    }


    public function setTestFailed()
    {
        $this->_testPassed = false;
    }


    /**
     * @return boolean
     */
    public function getTestStatus()
    {
        return $this->_testPassed;
    }


    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->_message;
    }


    /**
     * Set the test case message. Typical values for this will be the reasons for
     * failure, etc.
     *
     * @param string $message
     */
    public function setMessage($message)
    {
        if($message == null)
        {
            $this->_message = '';
        }
        else
        {
            $this->_message = strval($message);
        }
    }


    /**
     * @param string $testCaseName
     */
    public function setTestCaseName($testCaseName)
    {
        $this->_testCaseName = strval($testCaseName);
    }


    /**
     * @return string
     */
    public function getTestCaseName()
    {
        return $this->_testCaseName;
    }
}
