<?php
/**
 * This file is part of the hrphp-framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hrphp;

/**
 * DI Container
 *
 * @package Hrphp
 * @author Guillermo A. Fisher <me@guillermoandraefisher.com>
 */
class Di
{
    /**
     * @var array
     */
    private static $registry;

    /**
     * @param string $offset
     * @param mixed $value
     */
    public static function set($offset, $value)
    {
        self::$registry[$offset] = $value;
    }

    /**
     * @param string $offset
     * @return mixed
     */
    public static function get($offset)
    {
        if (array_key_exists($offset, self::$registry)) {
            return self::$registry[$offset];
        }
    }

    /**
     * @param string $offset
     * @return bool
     */
    public static function exists($offset)
    {
        return array_key_exists($offset, self::$registry);
    }

    /**
     * @param string $offset
     */
    public static function remove($offset)
    {
        unset(self::$registry[$offset]);
    }
}
