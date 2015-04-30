<?php
/**
 * This file is part of the hrphp-framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hrphp;

class Di
{
    private static $registry;

    public static function set($offset, $value)
    {
        self::$registry[$offset] = $value;
    }

    public static function get($offset)
    {
        if (array_key_exists($offset, self::$registry)) {
            return self::$registry[$offset];
        }
    }

    public static function exists($offset)
    {
        return array_key_exists($offset, self::$registry);
    }

    public static function remove($offset)
    {
        unset(self::$registry[$offset]);
    }
}