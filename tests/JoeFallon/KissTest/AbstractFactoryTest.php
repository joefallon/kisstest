<?php declare(strict_types=1);

namespace Tests\JoeFallon\KissTest;

use Exception;
use JoeFallon\KissTest\UnitTest;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class AbstractFactoryTest extends UnitTest
{
    public function test_getRandomFloat_positive()
    {
        $float = ConcreteFactory::getRandomFloat(100, 200, 2);

        $this->assertFirstGreaterThanOrEqualSecond($float, 100, 'gt:' . $float);
        $this->assertFirstLessThanOrEqualSecond($float, 200, 'lt:' . $float);
    }

    public function test_getRandomFloat_negative()
    {
        $float = ConcreteFactory::getRandomFloat(-200, -100, 2);

        $this->assertFirstGreaterThanOrEqualSecond($float, -200, 'gt:' . $float);
        $this->assertFirstLessThanOrEqualSecond($float, -100, 'lt:' . $float);
    }

    public function test_getRandomFloat_negative_and_positive()
    {
        $float = ConcreteFactory::getRandomFloat(-100, 100, 2);

        $this->assertFirstGreaterThanOrEqualSecond($float, -100, 'gt:' . $float);
        $this->assertFirstLessThanOrEqualSecond($float, 100, 'lt:' . $float);
    }

    public function test_getNextSequenceNumber()
    {
        $this->assertEqual(ConcreteFactory::getNextSequenceNumber(), 1, '1');
        $this->assertEqual(ConcreteFactory::getNextSequenceNumber(), 2, '2');
        $this->assertEqual(ConcreteFactory::getNextSequenceNumber(), 3, '3');
    }

    public function test_create_throws_exception_when_not_overridden()
    {
        try
        {
            ConcreteFactory::create();
        }
        catch(Exception $ex)
        {
            $this->testPass();

            return;
        }

        $this->testFail();
    }

    public function test_build_throws_exception_when_not_overridden()
    {
        try
        {
            ConcreteFactory::build();
        }
        catch(Exception $ex)
        {
            $this->testPass();

            return;
        }

        $this->testFail();
    }

    public function test_sequence_number()
    {
        $n1 = \Tests\JoeFallon\KissTest\ConcreteFactory::getNextSequenceNumber();
        $n2 = \Tests\JoeFallon\KissTest\ConcreteFactory::getNextSequenceNumber();
        $this->assertTrue($n2 === $n1 + 1);
    }
}
