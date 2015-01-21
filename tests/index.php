<?php
use JoeFallon\KissTest\UnitTest;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
require('config/main.php');

/****************************************************************************
 * Code Coverage Start
 ****************************************************************************/
$filter = new PHP_CodeCoverage_Filter();
$filter->addDirectoryToBlacklist(realpath('./'));
$filter->addDirectoryToBlacklist(realpath('../vendor'));
$coverage = new PHP_CodeCoverage(null, $filter);
$coverage->start('All Tests');

new tests\JoeFallon\KissTest\AbstractFactoryTests();
new tests\JoeFallon\KissTest\MockTests();
new tests\JoeFallon\KissTest\Reporting\MilliTimespanTests();
new tests\JoeFallon\KissTest\Reporting\SummaryTests();
new tests\JoeFallon\KissTest\Reporting\TestCaseResultTests();
new tests\JoeFallon\KissTest\Reporting\UnitTestResultTests();

UnitTest::getAllUnitTestsSummary();

/****************************************************************************
 * Code Coverage Stop
 ****************************************************************************/
$coverage->stop();
$writer = new PHP_CodeCoverage_Report_HTML();
$writer->process($coverage, realpath('../cov'));

