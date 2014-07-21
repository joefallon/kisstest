<?php
namespace JoeFallon\KissTest;

use Exception;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 * @package   JoeFallon\KissTest
 */
abstract class AbstractFactory
{
    /** @var  int */
    protected static $_seq;


    /**
     * @return int
     */
    public static function getNextSequenceNumber()
    {
        if(self::$_seq == null)
        {
            self::$_seq = 0;
        }

        self::$_seq++;

        return self::$_seq;
    }


    /**
     * @param float $min
     * @param float $max
     * @param int   $decimalPlaces
     *
     * @return float
     */
    public static function getRandomFloat($min, $max, $decimalPlaces)
    {
        $min           = floatval($min);
        $max           = floatval($max);
        $decimalPlaces = intval($decimalPlaces);
        $range         = $max - $min;
        $num           = $min + $range * mt_rand(0, 32767) / 32767;

        if($decimalPlaces > 0)
        {
            $num = round($num, $decimalPlaces);
        }

        return $num;
    }

    /**
     * This function instiantiates the desired class fills it with data
     * and returns it. It does not persist the instance.
     *
     * @return mixed
     * @throws \Exception
     */
    public static function create()
    {
        throw new Exception('Method not implemented.');
    }


    /**
     * This function instiantiates the desired class fills it with data,
     * persists it to the database and returns it. Additionally, it should
     * build dependendent classes that any foreign keys point to.
     *
     * @return mixed
     * @throws \Exception
     */
    public static function build()
    {
        throw new Exception('Method not implemented.');
    }
}
