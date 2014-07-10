<?php
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */
use JoeFallon\Autoloader;

define('BASE_PATH', realpath(dirname(__FILE__).'/../../'));
define('DEMO_PATH', BASE_PATH.'/demo');
define('SRC_PATH',  BASE_PATH.'/src');
define('VEND_PATH', BASE_PATH.'/vendor');

require_once(VEND_PATH . '/autoload.php');

set_include_path(get_include_path().':'.DEMO_PATH.':'.SRC_PATH);
Autoloader::registerAutoLoad();
