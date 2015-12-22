<?php
namespace tests\JoeFallon\KissTest;

use JoeFallon\KissTest\UnitTest;

class UnitTestTests extends UnitTest
{
    public function test_assertEqual()
    {
        $this->assertEqual(1, 1, "should be equal");
    }

    public function test_assertEqual_with_floats()
    {
        $this->assertEqual(1.0, 1.0, "floats should be equal");
    }

    public function test_assertNotEqual()
    {
        $this->assertNotEqual(1, 2, "should not be equal");
    }

    public function test_assertFirstGreaterThanSecond()
    {
        $this->assertFirstGreaterThanSecond(2, 1, "2 > 1");
    }

    public function test_assertFirstLessThanSecond()
    {
        $this->assertFirstLessThanSecond(1, 2, "1 < 2");
    }

    public function test_assertFalse()
    {
        $this->assertFalse(false, "should be false");
    }
}
