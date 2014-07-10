<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */

class Foo
{
    private $_bar;

    public function __construct(Bar $bar)
    {
        $this->_bar = $bar;
    }

    public function methodFoo()
    {
        $bar = $this->_bar;
        return $bar->methodBar(1, 'two');
    }
}
