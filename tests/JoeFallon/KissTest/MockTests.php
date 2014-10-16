<?php
namespace tests\JoeFallon\KissTest;

use Exception;
use JoeFallon\KissTest\Mock;
use JoeFallon\KissTest\UnitTest;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */

class MockTests extends UnitTest
{
    public function test_setMethodReturnValue_properly_overwrites_previous_sets()
    {
        $mock = new Mock();
        $mock->setMethodReturnValue('testMethod', 'a', 1);
        $mock->setMethodReturnValue('testMethod', 'c', 2);
        $mock->setMethodReturnValue('testMethod', 'b', 1);
        $return = $mock->methodCalled('testMethod', array(1, 2));

        $this->assertEqual($return, 'b', 'with call count');

        $mock = new Mock();
        $mock->setMethodReturnValue('testMethod', 'a');
        $mock->setMethodReturnValue('testMethod', 'b');
        $return = $mock->methodCalled('testMethod', array(1, 2));

        $this->assertEqual($return, 'b', 'without call count');
    }

    public function test_methodReturnValue_getter_setter()
    {
        $mock = new Mock();
        $mock->setMethodReturnValue('testMethod', 'a', 1);
        $mock->setMethodReturnValue('testMethod', 'b', 2);
        $mock->setMethodReturnValue('testMethod', 'c', 3);
        $mock->setMethodReturnValue('testMethod', 'd', 4);

        $this->assertEqual($mock->methodCalled('testMethod', array(1, 2)), 'a');
        $this->assertEqual($mock->methodCalled('testMethod', array(3, 4)), 'b');
        $this->assertEqual($mock->methodCalled('testMethod', array(5, 6)), 'c');
        $this->assertEqual($mock->methodCalled('testMethod', array(7, 8)), 'd');

        $mock->setMethodReturnValue('otherMethod', 'z');
        $mock->methodCalled('otherMethod', array(1, 2));
        $this->assertEqual($mock->methodCalled('otherMethod', array(1, 2)), 'z');
        $mock->methodCalled('otherMethod', array(1, 2));
        $this->assertEqual($mock->methodCalled('otherMethod', array(1, 2)), 'z');
        $mock->methodCalled('otherMethod', array(1, 2));
        $this->assertEqual($mock->methodCalled('otherMethod', array(1, 2)), 'z');
        $mock->methodCalled('otherMethod', array(1, 2));
        $this->assertEqual($mock->methodCalled('otherMethod', array(1, 2)), 'z');

    }

    public function test_setMethodReturnValue_throws_exception_on_empty_name()
    {
        try
        {
            $mock = new Mock();
            $mock->setMethodReturnValue('');
        }
        catch(Exception $e)
        {
            $this->testPass();
            return;
        }

        $this->testFail();
    }

    public function test_getMethodArgs_returns_correct_args()
    {
        $mock = new Mock();
        $mock->methodCalled('testMethod', array(1, 2));
        $args = $mock->getMethodArgs('testMethod', 1);
        $this->assertEqual($args[0], 1);
        $this->assertEqual($args[1], 2);

        $mock->methodCalled('testMethod', array(3, 4));
        $args = $mock->getMethodArgs('testMethod', 2);
        $this->assertEqual($args[0], 3);
        $this->assertEqual($args[1], 4);

        $mock->methodCalled('testMethod', array(5, 6));
        $args = $mock->getMethodArgs('testMethod', 3);
        $this->assertEqual($args[0], 5);
        $this->assertEqual($args[1], 6);

        $mock->methodCalled('testMethod', array(7, 8));
        $args = $mock->getMethodArgs('testMethod', 4);
        $this->assertEqual($args[0], 7);
        $this->assertEqual($args[1], 8);
    }

    public function test_getMethodArgs_throws_exception_if_callCount_too_high()
    {
        try
        {
            $mock = new Mock();
            $mock->methodCalled('testMethod');
            $mock->getMethodArgs('testMethod', 2);
        }
        catch(Exception $e)
        {
            $this->testPass();
            return;
        }

        $this->testFail();
    }

    public function test_getMethodArgs_throws_exception_on_empty_name()
    {
        try
        {
            $mock = new Mock();
            $mock->getMethodArgs('');
        }
        catch(Exception $e)
        {
            $this->testPass();
            return;
        }

        $this->testFail();
    }

    public function test_getMethodArgs_throws_exception_on_callCount_less_than_one()
    {
        try
        {
            $mock = new Mock();
            $mock->getMethodArgs('testName', 0);
        }
        catch(Exception $e)
        {
            $this->testPass();
            return;
        }

        $this->testFail();
    }

    public function test_getMethodCallCount_throws_exception_on_empty_name()
    {
        try
        {
            $mock = new Mock();
            $mock->getMethodCallCount('');
        }
        catch(Exception $e)
        {
            $this->testPass();
            return;
        }

        $this->testFail();
    }

    public function test_getMethodCallCount_returns_correct_count()
    {
        $mock = new Mock();

        $count = $mock->getMethodCallCount('testMethod');
        $this->assertEqual($count, 0);

        $mock->methodCalled('testMethod');
        $count = $mock->getMethodCallCount('testMethod');
        $this->assertEqual($count, 1);

        $mock->methodCalled('testMethod');
        $count = $mock->getMethodCallCount('testMethod');
        $this->assertEqual($count, 2);

        $mock->methodCalled('otherMethod');
        $count = $mock->getMethodCallCount('otherMethod');
        $this->assertEqual($count, 1);
        $count = $mock->getMethodCallCount('testMethod');
        $this->assertEqual($count, 2);

        $mock->methodCalled('thirdMethod', array('1', 2, 'three'));
        $count = $mock->getMethodCallCount('thirdMethod');
        $this->assertEqual($count, 1);
        $count = $mock->getMethodCallCount('testMethod');
        $this->assertEqual($count, 2);
    }

}

