<?php
/**
 * This file is part of the hrphp-framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hrphp;

/**
 * Route
 *
 * @package Hrphp
 * @author Guillermo A. Fisher <me@guillermoandraefisher.com>
 */
class Route
{
    /**
     * @var string
     */
    private $pattern;

    /**
     * @var string
     */
    private $httpMethod;

    /**
     * @var callable
     */
    private $callback;

    /**
     * @var array
     */
    private $params = [];

    /**
     * @var array
     */
    private $validationRules = [];

    /**
     * @param string $httpMethod
     * @param string $pattern
     * @param callable $callback
     */
    public function __construct($httpMethod, $pattern, callable $callback)
    {
        $this->setHttpMethod($httpMethod);
        $this->setPattern($pattern);
        $this->setCallback($callback);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getPattern();
    }

    /**
     * @param Environment $environment
     * @return bool
     */
    public function isMatch(Environment $environment)
    {
        // match the HTTP request method, URI pattern, and validation rules
    }

    /**
     * @throws \ErrorException
     */
    public function run()
    {
        // invoke the callback and pass it any params from the URI
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param $pattern
     * @return Route
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * @param mixed $httpMethod
     * @return Route
     */
    public function setHttpMethod($httpMethod)
    {
        $this->httpMethod = $httpMethod;
        return $this;
    }

    /**
     * @return callable
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @param callable $callback
     * @return Route
     */
    public function setCallback(callable $callback)
    {
        $this->callback = $callback;
        return $this;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $params
     * @return Route
     */
    public function setParams(array $params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return array
     */
    public function getValidationRules()
    {
        return $this->validationRules;
    }

    /**
     * @param array $validationRules
     * @return Route
     */
    public function setValidationRules(array $validationRules)
    {
        $this->validationRules = $validationRules;
        return $this;
    }
}
