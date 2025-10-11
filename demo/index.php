<?php declare(strict_types=1);

/**
 * @author Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright 2014-2025 Joseph Fallon
 * @license MIT
 */

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once __DIR__ . '/config/main.php';

use JoeFallon\KissTest\UnitTest;

new Demo\MocksUsage();
new Demo\ToStringTest();
new Demo\DummyTest();
new Demo\AnotherDummyTest();


UnitTest::getAllUnitTestsSummary();
