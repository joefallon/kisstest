<?php
declare(strict_types=1);

namespace JoeFallon\KissTest;

use Exception;

/**
 * Mock class for tracking method calls and return values in tests.
 *
 * @package JoeFallon\KissTest
 */
class Mock
{
    private array $_methodCalls = [];
    private array $_methodReturnValues = [];

    /**
     * Should be called whenever a method in the class under test is called.
     * Returns the previously specified return value for the specified method.
     * A call to this method should completely replace the body of the method under test.
     *
     * @param string     $methodName
     * @param array|null $args
     *
     * @return mixed
     * @throws Exception
     */
    public function methodCalled(string $methodName, ?array $args = null)
    {
        $this->_methodCalls[] = [
            'name' => $methodName,
            'args' => $args
        ];

        $callCount = $this->getMethodCallCount($methodName);
        $returnVal = $this->getMethodReturnValue($methodName, $callCount);

        return $returnVal;
    }

    /**
     * Returns the number of times the specified method has been called.
     *
     * @param string $methodName
     * @return int
     * @throws Exception
     */
    public function getMethodCallCount(string $methodName): int
    {
        if(strlen($methodName) === 0)
        {
            throw new Exception('Method name cannot be empty.');
        }

        $count = 0;

        foreach($this->_methodCalls as $value)
        {
            if($value['name'] === $methodName)
            {
                $count++;
            }
        }

        return $count;
    }

    /**
     * Returns the arguments supplied to a method for the specified call count of the method.
     *
     * @param string $methodName
     * @param int $callCount
     * @return mixed
     * @throws Exception
     */
    public function getMethodArgs(string $methodName, int $callCount = 1)
    {
        if(strlen($methodName) === 0)
        {
            throw new Exception('Method name cannot be empty.');
        }

        if($callCount < 1)
        {
            throw new Exception('Call count must be greater than or equal to one (1).');
        }

        $count = 0;

        foreach($this->_methodCalls as $call)
        {
            if($call['name'] === $methodName)
            {
                $count++;
            }

            if($count === $callCount)
            {
                return $call['args'];
            }
        }

        $msg  = 'The given call count is less than the number of ';
        $msg .= 'times the method was called.';
        $msg .= ' Method Name = ' . $methodName . ', ';
        $msg .= ' Given Call Count = ' . $callCount . ', ';
        $msg .= ' Actual Call Count = ' . $count;

        throw new Exception($msg);
    }

    /**
     * Sets the return value for a method, optionally for a specific call count.
     *
     * @param string $methodName
     * @param mixed $returnVal
     * @param int|null $callCount
     * @throws Exception
     */
    public function setMethodReturnValue(string $methodName, $returnVal = null, ?int $callCount = null): void
    {
        if(strlen($methodName) === 0)
        {
            throw new Exception('Method name cannot be empty.');
        }

        foreach($this->_methodReturnValues as &$value)
        {
            if($value['name'] === $methodName && $value['callCount'] === $callCount)
            {
                $value['return'] = $returnVal;
                return;
            }
        }

        $this->_methodReturnValues[] = [
            'name'      => $methodName,
            'return'    => $returnVal,
            'callCount' => $callCount
        ];
    }

    /**
     * Gets the return value for a method, optionally for a specific call count.
     *
     * @param string $methodName
     * @param int|null $callCount
     * @return mixed|null
     * @throws Exception
     */
    private function getMethodReturnValue(string $methodName, ?int $callCount = null)
    {
        if(strlen($methodName) === 0)
        {
            throw new Exception('Method name cannot be empty.');
        }

        // Return the return value specified by the name and callCount if possible.
        foreach($this->_methodReturnValues as $value)
        {
            if($value['name'] === $methodName && $value['callCount'] === $callCount)
            {
                return $value['return'];
            }
        }

        // Return the all call count return value, if exists.
        foreach($this->_methodReturnValues as $value)
        {
            if($value['name'] === $methodName && $value['callCount'] === null)
            {
                return $value['return'];
            }
        }

        return null;
    }
}
