<?php
declare(strict_types=1);

use JoeFallon\KissTest\UnitTest;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/config/main.php';

new tests\JoeFallon\KissTest\AbstractFactoryTests();
new tests\JoeFallon\KissTest\MockTests();
new tests\JoeFallon\KissTest\UnitTestTests();
new tests\JoeFallon\KissTest\Reporting\MilliTimespanTests();
new tests\JoeFallon\KissTest\Reporting\SummaryTests();
new tests\JoeFallon\KissTest\Reporting\TestCaseResultTests();
new tests\JoeFallon\KissTest\Reporting\UnitTestResultTests();

UnitTest::getAllUnitTestsSummary();
