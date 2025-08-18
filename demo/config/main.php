<?php
declare(strict_types=1);
/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 *
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 *
 * @license   MIT
 */

define('BASE_PATH', realpath(dirname(__FILE__).'/../../'));
const DEMO_PATH = BASE_PATH . '/demo';
const SRC_PATH = BASE_PATH . '/src';
const VEND_PATH = BASE_PATH . '/vendor';

require_once(VEND_PATH . '/autoload.php');

set_include_path(get_include_path().':'.DEMO_PATH.':'.SRC_PATH);
//AutoLoader::registerAutoLoad();
