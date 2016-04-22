<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */


require('config/main.php');

use JoeFallon\KissTest\UnitTest;


new MocksUsage();
new ToStringTest();
new DummyTest();
new AnotherDummyTest();


UnitTest::getAllUnitTestsSummary();

