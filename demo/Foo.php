<?php declare(strict_types=1);

namespace Demo;

/**
 * @author Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright 2014-2025 Joseph Fallon
 * @license MIT
 */
class Foo
{
    private Bar $_bar;

    public function __construct(Bar $bar)
    {
        $this->_bar = $bar;
    }

    public function methodFoo(): string
    {
        $bar = $this->_bar;
        $result = $bar->methodBar(1, 'two');

        return $result;
    }
}
