<?php
use JoeFallon\KissTest\UnitTest;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
require('config/main.php');

$coverage = new PHP_CodeCoverage;
$coverage->start('All tests');

new tests\JoeFallon\KissTest\AbstractFactoryTests();
new tests\JoeFallon\KissTest\MockTests();
new tests\JoeFallon\KissTest\Reporting\MilliTimespanTests();
new tests\JoeFallon\KissTest\Reporting\SummaryTests();
new tests\JoeFallon\KissTest\Reporting\TestCaseResultTests();
new tests\JoeFallon\KissTest\Reporting\UnitTestResultTests();


$coverage->stop();

$writer = new PHP_CodeCoverage_Report_HTML;
$writer->process($coverage, '../cov');

UnitTest::getAllUnitTestsSummary();
