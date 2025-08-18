<?php
declare(strict_types=1);
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
require_once __DIR__ . '/../vendor/autoload.php';

require('config/main.php');

use JoeFallon\KissTest\UnitTest;


new demo\MocksUsage();
new demo\ToStringTest();
new demo\DummyTest();
new demo\AnotherDummyTest();


UnitTest::getAllUnitTestsSummary();
