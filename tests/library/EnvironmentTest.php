<?php
/**
 * This file is part of the hrphp-framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HrphpTest;

use Hrphp\Environment;

class EnvironmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Environment
     */
    private $environment;

    public function testDefaultEnvironment()
    {
        $expected = [
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
            'REMOTE_ADDR' => '127.0.0.1'
        ];
        $environment = $this->getEnvironment();
        foreach ($expected as $key => $value) {
            static::assertSame($value, $environment[$key]);
        }
    }

    public function testCustomEnvironment()
    {
        $expected = 8080;
        $environment = new Environment(['SERVER_PORT' => $expected]);
        static::assertSame($expected, $environment['SERVER_PORT']);
    }

    public function testOffsetGet()
    {
        $expected = 'GET';
        static::assertSame($expected, $this->getEnvironment()->offsetGet('REQUEST_METHOD'));
    }

    public function testOffsetGetNonexistentOffset()
    {
        static::assertNull($this->getEnvironment()->offsetGet('sponge'));
    }

    public function testOffsetSet()
    {
        $expected = 'bar';
        $this->getEnvironment()->offsetSet('foo', $expected);
        static::assertSame($expected, $this->getEnvironment()->offsetGet('foo'));
    }

    public function testOffsetExistsOffsetRemove()
    {
        $this->getEnvironment()->offsetSet('foo2', 'bar');
        static::assertTrue($this->getEnvironment()->offsetExists('foo2'));
        $this->getEnvironment()->offsetUnset('foo2');
        static::assertFalse($this->getEnvironment()->offsetExists('foo2'));
    }

    public function getEnvironment()
    {
        return $this->environment;
    }

    protected function setUp()
    {
        $_SERVER = [
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
            'REMOTE_ADDR' => '127.0.0.1'
        ];
        $this->environment = new Environment();
    }
}
