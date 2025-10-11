<?php declare(strict_types=1);

namespace JoeFallon\KissTest\Reporting;

/**
 * Represents the result of a unit test, including its name, test case results,
 * and aggregate statistics such as assert count, execution time, and pass/fail rates.
 *
 * This class is part of the core reporting logic and is independent of external frameworks.
 */
class UnitTestResult
{
    private string $_unitTestName    = '';
    private array  $_testCaseResults = [];

    public function __construct()
    {
        $this->_testCaseResults = [];
    }

    public function getAssertCount(): int
    {
        $sum = 0;
        foreach($this->_testCaseResults as $result)
        {
            /* @var $result TestCaseResult */
            $sum += $result->getAssertCount();
        }

        return $sum;
    }

    public function getUnitTestName(): string
    {
        return $this->_unitTestName;
    }

    public function setUnitTestName(string $name): void
    {
        $this->_unitTestName = $name;
    }

    public function addTestCaseResult(TestCaseResult $testCaseResult): void
    {
        $this->_testCaseResults[] = $testCaseResult;
    }

    public function getTestCaseCount(): int
    {
        return count($this->_testCaseResults);
    }

    public function getExecutionTimeInMillisecs(): float
    {
        $sum = 0.0;
        foreach($this->_testCaseResults as $result)
        {
            /* @var $result TestCaseResult */
            $sum += $result->getExecutionTimeInMillisecs();
        }

        return $sum;
    }

    public function getNumberTestCasesPass(): int
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

    public function getNumberTestCasesFailed(): int
    {
        return $this->getTestCaseCount() - $this->getNumberTestCasesPass();
    }

    public function getPercentagePassed(): float
    {
        $total = (float)$this->getTestCaseCount();
        if($total === 0.0)
        {
            return 0.0;
        }
        $passed = (float)$this->getNumberTestCasesPass();

        return ($passed / $total) * 100.0;
    }

    public function getPercentageFailed(): float
    {
        return 100.0 - $this->getPercentagePassed();
    }

    public function getTestCaseResults(): array
    {
        return $this->_testCaseResults;
    }
}
