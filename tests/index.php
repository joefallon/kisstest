<?php declare(strict_types=1);

/**
 * @author Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright 2014-2025 Joseph Fallon
 * @license MIT
 */

use JoeFallon\KissTest\UnitTest;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/config/main.php';

new Tests\JoeFallon\KissTest\AbstractFactoryTest();
new Tests\JoeFallon\KissTest\MockTest();
new Tests\JoeFallon\KissTest\UnitTestTest();
new Tests\JoeFallon\KissTest\Reporting\MilliTimespanTest();
new Tests\JoeFallon\KissTest\Reporting\SummaryTest();
new Tests\JoeFallon\KissTest\Reporting\TestCaseResultTest();
new Tests\JoeFallon\KissTest\Reporting\UnitTestResultTest();

UnitTest::getAllUnitTestsSummary();
