<?php declare(strict_types=1);

namespace Demo;

use JoeFallon\KissTest\UnitTest;

/**
 * @author Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright 2014-2025 Joseph Fallon
 * @license MIT
 */
class DummyTest extends UnitTest
{
    public function test_demo_fail()
    {
        $this->notImplementedFail();
    }

    public function test_demo_fail2()
    {
        $this->testFail();
    }

    public function test_demo_pass()
    {
        $this->assertTrue(true);
    }

    public function test_demo_equal()
    {
        $this->assertEqual(2, 'fred', 'This is a test fail message.');
    }
}
