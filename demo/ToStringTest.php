<?php declare(strict_types=1);

namespace Demo;

use JoeFallon\KissTest\UnitTest;

/**
 * @author Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright 2014-2025 Joseph Fallon
 * @license MIT
 */
class ToStringTest extends UnitTest
{
    public function test_to_string()
    {
        $exampleClass = new ExampleClass();
        $this->assertEqual('example', (string)$exampleClass);
    }
}

/**
 * ExampleClass provides a string representation for demonstration purposes.
 *
 * @package Demo
 */
class ExampleClass
{
    /**
     * @return string
     */
    public function __toString()
    {
        return 'example';
    }
}
