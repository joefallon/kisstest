<?php
declare(strict_types=1);

namespace JoeFallon\KissTest;

use Exception;

/**
 * AbstractFactory provides utility methods for test data factories.
 *
 * @package JoeFallon\KissTest
 */
abstract class AbstractFactory
{
    /**
     * Sequence number for unique test data generation.
     * @var int|null
     */
    protected static ?int $_nextSequenceNumber = null;

    /**
     * Returns the next sequence number for test data.
     * @return int
     */
    public static function getNextSequenceNumber(): int
    {
        if(self::$_nextSequenceNumber === null)
        {
            self::$_nextSequenceNumber = 0;
        }

        self::$_nextSequenceNumber++;

        return self::$_nextSequenceNumber;
    }

    /**
     * Returns a random float between $min and $max, rounded to $decimalPlaces.
     * @param float $min
     * @param float $max
     * @param int $decimalPlaces
     * @return float
     */
    public static function getRandomFloat(float $min, float $max, int $decimalPlaces): float
    {
        $range = $max - $min;
        $num   = $min + $range * mt_rand(0, 32767) / 32767;

        if($decimalPlaces > 0)
        {
            $num = round($num, $decimalPlaces);
        }

        return $num;
    }

    /**
     * Instantiates the desired class, fills it with data, and returns it.
     * Does not persist the instance.
     *
     * @throws Exception
     */
    public static function create()
    {
        throw new Exception('Method not implemented.');
    }

    /**
     * Instantiates the desired class, fills it with data, persists it, and returns it.
     * Should build dependent classes for any foreign keys.
     *
     * @throws Exception
     */
    public static function build()
    {
        throw new Exception('Method not implemented.');
    }
}
