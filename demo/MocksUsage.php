<?php declare(strict_types=1);

namespace Demo;

use Exception;
use JoeFallon\KissTest\UnitTest;

/**
 * @author Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright 2014-2025 Joseph Fallon
 * @license MIT
 */
class MocksUsage extends UnitTest
{
    /**
     * @throws Exception
     */
    public function test_kissmock_usage()
    {
        $bar = new BarMock();
        $bar->_mock->setMethodReturnValue('methodBar', 'a', 1);
        $bar->_mock->setMethodReturnValue('methodBar', 'b', 2);

        $foo = new Foo($bar);
        $ret1 = $foo->methodFoo();
        $ret2 = $foo->methodFoo();

        $this->assertEqual($ret1, 'a');
        $this->assertEqual($ret2, 'b');

        $callCount = $bar->_mock->getMethodCallCount('methodBar');
        $this->assertEqual($callCount, 2);

        $args1 = $bar->_mock->getMethodArgs('methodBar', 1);
        $args2 = $bar->_mock->getMethodArgs('methodBar', 2);

        $this->assertEqual($args1[0], 1);
        $this->assertEqual($args1[1], 'two');
        $this->assertEqual($args2[0], 1);
        $this->assertEqual($args2[1], 'two');
    }
}
