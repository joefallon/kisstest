<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
use JoeFallon\KissTest\UnitTest;


class ToStringTest extends UnitTest
{
    public function test_class_assert_equal()
    {
        $ex1 = new ExampleClass();
        $ex2 = new ExampleClass();


        $this->assertEqual($ex1, $ex2);
    }
}

class ExampleClass
{
    public $a;
}
