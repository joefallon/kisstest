<?php
namespace JoeFallon\KissTest;

use Exception;

abstract class AbstractFactory
{
    /** @var int */
    protected static $_nextSequenceNumber;


    /**
     * @return int
     */
    public static function getNextSequenceNumber()
    {
        if(self::$_nextSequenceNumber == null)
        {
            self::$_nextSequenceNumber = 0;
        }

        self::$_nextSequenceNumber++;

        return self::$_nextSequenceNumber;
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
     * This function instantiates the desired class fills it with data
     * and returns it. It does not persist the instance.
     *
     * @return mixed
     * @throws Exception
     */
    public static function create()
    {
        throw new Exception('Method not implemented.');
    }


    /**
     * This function instantiates the desired class fills it with data,
     * persists it to the database and returns it. Additionally, it should
     * build dependent classes that any foreign keys point to.
     *
     * @return mixed
     * @throws Exception
     */
    public static function build()
    {
        throw new Exception('Method not implemented.');
    }
}
