<?php
use JoeFallon\AutoLoader;
use JoeFallon\KissTest\UnitTest;

// Define the include paths.
define('BASE_PATH', realpath(dirname(__FILE__).'/../../'));
define('SRC_PATH',  BASE_PATH.'/src');
define('VEND_PATH', BASE_PATH.'/vendor');

// Set the application include paths for autoloading.
set_include_path(get_include_path().':'.SRC_PATH.':'.BASE_PATH);

require(VEND_PATH.'/autoload.php');

AutoLoader::registerAutoLoad();

UnitTest::setCodeCoverageOutputDirectory('../cov');
UnitTest::addDirectoryToCoverageBlacklist('../tests');
UnitTest::addDirectoryToCoverageBlacklist('../vendor');
UnitTest::setCodeCoverageEnabled(true);
