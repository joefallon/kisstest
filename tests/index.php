<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
use JoeFallon\KissTest\UnitTest;

require('config/main.php');

new tests\JoeFallon\KissTest\AbstractFactoryTests();
new tests\JoeFallon\KissTest\MockTests();
new tests\JoeFallon\KissTest\Reporting\MilliTimespanTests();
new tests\JoeFallon\KissTest\Reporting\SummaryTests();
new tests\JoeFallon\KissTest\Reporting\TestCaseResultTests();
new tests\JoeFallon\KissTest\Reporting\UnitTestResultTests();

UnitTest::getAllUnitTestsSummary();
