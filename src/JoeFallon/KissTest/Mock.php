<?php
namespace JoeFallon\KissTest;

use Exception;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class Mock
{
    /** @var array */
    private $_methodCalls;
    /** @var array */
    private $_methodReturnValues;


    public function __construct()
    {
        $this->_methodCalls        = array();
        $this->_methodReturnValues = array();
    }


    /**
     * This method should be called whenever a method in the
     * class under test is called. It returns the previously
     * specified return value for the specified method. Lastly,
     * a call to this method should completely replace of the
     * body of the method under test
     *
     * @param string $methodName
     * @param null   $args
     *
     * @return null
     */
    public function methodCalled($methodName, $args = null)
    {
        $this->_methodCalls[] = array(
            'name' => $methodName,
            'args' => $args
        );

        $callCount = $this->getMethodCallCount($methodName);
        $returnVal = $this->getMethodReturnValue($methodName, $callCount);

        return $returnVal;
    }


    /**
     * This method returns the number of times the sepcified method has
     * been called.
     *
     * @param string $methodName
     *
     * @return int
     * @throws Exception
     */
    public function getMethodCallCount($methodName)
    {
        $methodName = strval($methodName);

        if(strlen($methodName) == 0)
        {
            $msg = 'Method name cannot be empty.';
            throw new Exception($msg);
        }

        $count = 0;
        $calls = $this->_methodCalls;

        foreach($calls as $value)
        {
            if($value['name'] == $methodName)
            {
                $count++;
            }
        }

        return $count;
    }


    /**
     * This method returns the arguments supplied to a method for
     * the specified call count of the method. For example, to retrieve
     * the arguments supplied to a method on the thrid time it was
     * called, use a $callCount of 3. The supplied arguments are
     * returned in the form of an array.
     *
     * @param string $methodName
     * @param int    $callCount
     *
     * @return mixed
     * @throws Exception
     */
    public function getMethodArgs($methodName, $callCount = 1)
    {
        $methodName = strval($methodName);
        $callCount  = intval($callCount);

        if(strlen($methodName) == 0)
        {
            $msg = 'Method name cannot be empty.';
            throw new Exception($msg);
        }

        if($callCount < 1)
        {
            $msg = 'Call count must be greater than or equal to one (1).';
            throw new Exception($msg);
        }

        $count = 0;
        $calls = $this->_methodCalls;

        foreach($calls as $call)
        {
            if($call['name'] == $methodName)
            {
                $count++;
            }

            if($count == $callCount)
            {
                return $call['args'];
            }
        }

        $msg = 'The given call count is less than the number of ';
        $msg .= 'times the method was called.';
        $msg .= ' Method Name = ' . $methodName . ', ';
        $msg .= ' Given Call Count = ' . $callCount . ', ';
        $msg .= ' Actual Call Count = ' . $count;

        throw new Exception($msg);
    }


    /**
     * @param string $methodName
     * @param null   $returnVal
     * @param null   $callCount
     *
     * @throws Exception
     */
    public function setMethodReturnValue($methodName,
                                         $returnVal = null,
                                         $callCount = null)
    {
        $methodName = strval($methodName);
        $callCount  = intval($callCount);

        if(strlen($methodName) == 0)
        {
            $msg = 'Method name cannot be empty.';
            throw new Exception($msg);
        }

        $r     = &$this->_methodReturnValues;
        $count = count($r);

        for($i = 0; $i < $count; $i++)
        {
            if($r[$i]['name'] == $methodName && $r[$i]['callCount'] == $callCount)
            {
                $r[$i]['return'] = $returnVal;

                return;
            }
        }


        $r[] = array(
            'name'      => $methodName,
            'return'    => $returnVal,
            'callCount' => $callCount
        );
    }


    /**
     * @param string $methodName
     * @param null   $callCount
     *
     * @return null
     * @throws Exception
     */
    private function getMethodReturnValue($methodName, $callCount = null)
    {
        $methodName = strval($methodName);
        $callCount  = intval($callCount);

        if(strlen($methodName) == 0)
        {
            $msg = 'Method name cannot be empty.';
            throw new Exception($msg);
        }

        $calls = $this->_methodReturnValues;

        // Return the return value specified by the name and callCount if possible.
        foreach($calls as $value)
        {
            if($value['name'] == $methodName && $value['callCount'] == $callCount)
            {
                return $value['return'];
            }
        }

        // Since the return value specified by the name and callCount was not
        // found, return the all call count return value, if exists.
        foreach($calls as $value)
        {
            if($value['name'] == $methodName && $value['callCount'] == null)
            {
                return $value['return'];
            }
        }

        return null;
    }
}
