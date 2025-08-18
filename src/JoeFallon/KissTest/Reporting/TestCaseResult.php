<?php
declare(strict_types=1);

namespace JoeFallon\KissTest\Reporting;

/**
 * Represents the result of a single test case execution, including timing,
 * pass/fail status, assertion count, and an optional message.
 *
 * This class is responsible for tracking and reporting the outcome of a test case.
 */
class TestCaseResult
{
    private float $executionTimeInMillisecs = 0.0;
    private bool $testPassed = true;
    private string $message = '';
    private MilliTimespan $milliTimespan;
    private string $testCaseName = '';
    private int $assertCount = 0;

    public function __construct(MilliTimespan $milliTimespan)
    {
        $this->milliTimespan = $milliTimespan;
        $this->testPassed    = true;
    }

    public function startTestCase(): void
    {
        $this->milliTimespan->startTimer();
    }

    public function getAssertCount(): int
    {
        return $this->assertCount;
    }

    public function setAssertCount(int $count): void
    {
        $this->assertCount = $count;
    }

    public function stopTestCase(): void
    {
        $this->milliTimespan->stopTimer();
        $elapsed = $this->milliTimespan->getElapsedTimeInMilliSec();
        $this->executionTimeInMillisecs = $elapsed;
    }

    public function getExecutionTimeInMillisecs(): float
    {
        return $this->executionTimeInMillisecs > 0
            ? $this->executionTimeInMillisecs
            : 0.0;
    }

    public function setTestPassed(): void
    {
        $this->testPassed = true;
    }

    public function setTestFailed(): void
    {
        $this->testPassed = false;
    }

    public function getTestStatus(): bool
    {
        return $this->testPassed;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(?string $message): void
    {
        $this->message = $message === null ? '' : $message;
    }

    public function setTestCaseName(string $testCaseName): void
    {
        $this->testCaseName = $testCaseName;
    }

    public function getTestCaseName(): string
    {
        return $this->testCaseName;
    }
}
