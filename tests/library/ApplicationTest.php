<?php
/**
 * This file is part of the hrphp-framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HrphpTest;

use Hrphp\Application;
use Hrphp\Environment;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    private $application;

    public function testGetSetEnvironment()
    {
        $environment = new Environment();
        $this->getApplication()->setEnvironment($environment);
        static::assertSame($environment, $this->getApplication()->getEnvironment());
    }

    public function testGet()
    {
        $expectedHttpMethod = 'GET';
        $expectedPattern = '/test/:id';
        $expectedCallback = function () {
            return 'hi!';
        };
        $this->getApplication()->get($expectedPattern, $expectedCallback);
        $this->assertRouteAdded($expectedHttpMethod, $expectedPattern, $expectedCallback);
    }

    public function testPost()
    {
        $expectedHttpMethod = 'POST';
        $expectedPattern = '/test/:id';
        $expectedCallback = function () {
            return 'hi!';
        };
        $this->getApplication()->post($expectedPattern, $expectedCallback);
        $this->assertRouteAdded($expectedHttpMethod, $expectedPattern, $expectedCallback);
    }

    public function testAddRoute()
    {
        $expectedHttpMethod = 'GET';
        $expectedPattern = '/test/:id';
        $expectedCallback = function () {
            return 'hi!';
        };
        $expectedValidationRules = array('id' => '[0-9]+');
        $this->getApplication()->addRoute(
            $expectedHttpMethod,
            $expectedPattern,
            $expectedCallback,
            $expectedValidationRules
        );
        $this->assertRouteAdded($expectedHttpMethod, $expectedPattern, $expectedCallback, $expectedValidationRules);
    }

    public function getApplication()
    {
        return $this->application;
    }

    protected function assertRouteAdded(
        $expectedHttpMethod,
        $expectedPattern,
        $expectedCallback,
        array $expectedValidationRules = []
    ) {
        $application = $this->getApplication();
        $application->addRoute($expectedHttpMethod, $expectedPattern, $expectedCallback, $expectedValidationRules);
        $route = $application->getRoutes()[0];
        static::assertSame($expectedHttpMethod, $route->getHttpMethod());
        static::assertSame($expectedPattern, $route->getPattern());
        static::assertSame($expectedCallback, $route->getCallback());
        static::assertSame($expectedValidationRules, $route->getValidationRules());
        $this->setUp();
    }

    protected function setUp()
    {
        $this->application = new Application();
    }
}
