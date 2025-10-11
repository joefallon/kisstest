<?php declare(strict_types=1);

namespace Demo;

use JoeFallon\KissTest\UnitTest;

/**
 * @author Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright 2014-2025 Joseph Fallon
 * @license MIT
 */
class AnotherDummyTest extends UnitTest
{
    public function test_float_equal()
    {
        $this->assertEqual(1.0, 2.0, '', 0.001);
    }

    public function test_first_greater_than_second()
    {
        $this->assertFirstGreaterThanOrEqualSecond(1, 1.5);
    }

    public function test_not_equal()
    {
        $this->assertNotEqual(2, 2);
    }

    public function test_something()
    {
        $this->assertTrue(true);
    }
}
