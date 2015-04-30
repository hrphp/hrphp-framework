<?php
/**
 * This file is part of the hrphp-framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HrphpTest;

use Hrphp\Di;

class DiTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSet()
    {
        $expected = 'bar';
        Di::set('foo', $expected);
        static::assertSame($expected, Di::get('foo'));
    }

    public function testGetNonexistent()
    {
        static::assertNull(Di::get('sponge'));
    }

    public function testExistsRemove()
    {
        Di::set('foo', 'bar');
        static::assertNull(Di::get('sponge'));
        Di::remove('foo');
        static::assertFalse(Di::exists('foo'));
    }
}
