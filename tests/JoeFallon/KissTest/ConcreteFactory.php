<?php
declare(strict_types=1);

namespace tests\JoeFallon\KissTest;

use Exception;
use JoeFallon\KissTest\AbstractFactory;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class ConcreteFactory extends AbstractFactory
{

    /**
     * This function instantiates the desired class fills it with data
     * and returns it. It does not persist the instance.
     *
     * @throws Exception
     */
    public static function create()
    {
        parent::create();
    }

    /**
     * This function instantiates the desired class fills it with data,
     * persists it to the database and returns it. Additionally, it should
     * build dependent classes that any foreign keys point to.
     *
     * @throws Exception
     */
    public static function build()
    {
        parent::build();
    }
}
