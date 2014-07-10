<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */

use JoeFallon\KissTest\Mock;

class BarMock extends Bar
{
    public $_mock;

    public function __construct()
    {
        $this->_mock = new Mock();
    }

    public function methodBar($int1, $str2)
    {
        return $this->_mock->methodCalled('methodBar', array($int1, $str2));
    }
}
