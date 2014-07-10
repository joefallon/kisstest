<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
use JoeFallon\KissTest\UnitTest;

class AnotherDummyTest extends UnitTest
{
    public function test_float_equal()
    {
        $this->assertEqual(1.0, 2.0, '', 0.001);
    }

    public function test_first_greater_than_second()
    {
        $this->assertFirstGreaterThanSecond(1, 1.5);
    }

    public function test_not_equal()
    {
        $this->assertNotEqual(2, 2);
    }
}
