<?php
declare(strict_types=1);

namespace JoeFallon\KissTest\Reporting;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class Summary
{
    /** @var UnitTestResult[] */
    private array $_unitTestResults;
    /** @var MilliTimespan */
    private static MilliTimespan $_timer;

    public function __construct()
    {
        $this->_unitTestResults = [];
        self::$_timer = new MilliTimespan();
        self::$_timer->startTimer();
    }

    public function getUnitTestCount(): int
    {
        return count($this->_unitTestResults);
    }

    public function addUnitTestResult(UnitTestResult $unitTestResult): void
    {
        $this->_unitTestResults[] = $unitTestResult;
    }

    public function getNumberOfAsserts(): string
    {
        $total = 0;
        foreach ($this->_unitTestResults as $result) {
            /* @var $result UnitTestResult */
            $total += $result->getAssertCount();
        }
        return number_format($total);
    }

    public function getTestCasesCount(): int
    {
        $total = 0;
        foreach ($this->_unitTestResults as $result) {
            $total += $result->getTestCaseCount();
        }
        return $total;
    }

    public function getTestCasesPassedCount(): int
    {
        $totalPassed = 0;
        foreach ($this->_unitTestResults as $result) {
            $totalPassed += $result->getNumberTestCasesPass();
        }
        return $totalPassed;
    }

    public function getTestCasesFailedCount(): int
    {
        $total  = $this->getTestCasesCount();
        $passed = $this->getTestCasesPassedCount();
        return $total - $passed;
    }

    public function getExecutionTimeInMillisecs(): float
    {
        self::$_timer->stopTimer();
        $totalTime = self::$_timer->getElapsedTimeInMilliSec();
        return $totalTime;
    }

    public function getPercentagePassed(): float
    {
        $total = $this->getTestCasesCount();
        if ($total === 0) {
            return 100.0;
        }
        $passed = $this->getTestCasesPassedCount();
        $percentPassed = ($passed / $total) * 100.0;
        return $percentPassed;
    }

    public function getPercentageFailed(): float
    {
        return 100.0 - $this->getPercentagePassed();
    }

    /**
     * @return UnitTestResult[]
     */
    public function getUnitTestsResults(): array
    {
        return $this->_unitTestResults;
    }
}
