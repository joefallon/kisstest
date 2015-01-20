<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
require('config/main.php');

$filter = new PHP_CodeCoverage_Filter();
$filter->addDirectoryToBlacklist(realpath('../vendor/'));
$coverage = new PHP_CodeCoverage(null, $filter);
$coverage->start('All');

use JoeFallon\KissTest\UnitTest;

new MocksUsage();
new ToStringTest();
new DummyTest();
new AnotherDummyTest();


UnitTest::getAllUnitTestsSummary();

$coverage->stop();
$writer = new PHP_CodeCoverage_Report_HTML();
$writer->process($coverage, __DIR__.'/cov');