<?php
/**
 * This file is part of the hrphp-framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hrphp;

class Environment implements \ArrayAccess
{
    private $environment = [
        'REQUEST_METHOD' => 'GET',
        'SCRIPT_NAME' => '',
        'PATH_INFO' => '',
        'QUERY_STRING' => '',
        'SERVER_NAME' => 'localhost',
        'SERVER_PORT' => 80,
        'ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'ACCEPT_LANGUAGE' => 'en-US,en;q=0.8',
        'ACCEPT_CHARSET' => 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
        'USER_AGENT' => 'HRPHP Framework',
        'REMOTE_ADDR' => '127.0.0.1',
        'REQUEST_TIME' => ''
    ];

    public function __construct(array $options = [])
    {
        if (!array_key_exists('REQUEST_TIME', $_SERVER)) {
            $_SERVER['REQUEST_TIME'] = time();
        }
        foreach ($_SERVER as $key => $value) {
            $envValue = $value;
            if (array_key_exists($key, $options)) {
                $envValue = $options[$key];
            }
            $this->environment[$key] = $envValue;
        }
    }

    public function offsetSet($offset, $value)
    {
        $this->environment[$offset] = $value;
    }

    public function offsetGet($offset)
    {
        if (array_key_exists($offset, $this->environment)) {
            return $this->environment[$offset];
        }
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->environment);
    }

    public function offsetUnset($offset)
    {
        unset($this->environment[$offset]);
    }
}
