<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
use JoeFallon\KissTest\UnitTest;


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
