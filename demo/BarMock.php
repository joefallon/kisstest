<?php declare(strict_types=1);

namespace Demo;

use Exception;
use JoeFallon\KissTest\Mock;

/**
 * @author Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright 2014-2025 Joseph Fallon
 * @license MIT
 */
class BarMock extends Bar
{
    public Mock $_mock;

    public function __construct()
    {
        // Call parent constructor with harmless defaults to satisfy signature
        parent::__construct(0, 0);
        $this->_mock = new Mock();
    }

    /**
     * @throws Exception
     * @noinspection PhpMissingParentCallCommonInspection
     */
    public function methodBar($int1, $str2)
    {
        return $this->_mock->methodCalled('methodBar', [$int1, $str2]);
    }
}
