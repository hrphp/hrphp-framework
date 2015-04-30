<?php
/**
 * This file is part of the hrphp-framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hrphp;

class Di implements \ArrayAccess
{
    private static $instance;

    private $registry;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function offsetSet($offset, $value)
    {
        $this->registry[$offset] = $value;
    }

    public function offsetGet($offset)
    {
        if (array_key_exists($offset, $this->environment)) {
            return $this->registry[$offset];
        }
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->registry);
    }

    public function offsetUnset($offset)
    {
        unset($this->registry[$offset]);
    }

    protected function __construct()
    {
    }
}