<?php
use JoeFallon\KissTest\UnitTest;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
require('config/main.php');

UnitTest::setCodeCoverageOutputDirectory('../cov');
//UnitTest::addDirectoryToCoverageBlacklist('../tests');
UnitTest::addDirectoryToCoverageBlacklist('../vendor');
UnitTest::setCodeCoverageEnabled(true);

new tests\JoeFallon\KissTest\AbstractFactoryTests();
new tests\JoeFallon\KissTest\MockTests();
new tests\JoeFallon\KissTest\UnitTestTests();
new tests\JoeFallon\KissTest\Reporting\MilliTimespanTests();
new tests\JoeFallon\KissTest\Reporting\SummaryTests();
new tests\JoeFallon\KissTest\Reporting\TestCaseResultTests();
new tests\JoeFallon\KissTest\Reporting\UnitTestResultTests();


UnitTest::getAllUnitTestsSummary();
