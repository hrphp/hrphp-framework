# The HRPHP Framework
[![Build Status](http://img.shields.io/travis/hrphp/hrphp-framework.svg?style=flat)](https://travis-ci.org/hrphp/hrphp-framework)
[![Code Coverage](http://img.shields.io/coveralls/hrphp/hrphp-framework.svg?style=flat)](https://coveralls.io/r/hrphp/hrphp-framework)
[![Scrutinizer Code Quality](http://img.shields.io/scrutinizer/g/hrphp/hrphp-framework.svg?style=flat)](https://scrutinizer-ci.com/g/hrphp/hrphp-framework/)

A tutorial project for developers interested in learning more about PHP web development frameworks.

## Overview
PHP web frameworks are ubiquitous. Using one can boost productivity. Writing one can teach you a lot about PHP, the web, and software engineering. The aim here is to build a micro-framework -- something lightweight with just enough functionality to allow a developer to build powerful applications.

## Getting started
The proposed routing mechanism is inspired by [Slim](http://www.slimframework.com/).

```php
// instantiate the app
$app = new \Hrphp\Application();

// define a new route with a basic response
$app->get('/foo', function () use ($app) {
    $app->render('Hello, World!');
});

// define a new route that has a corresponding layout and partial
$app->get('/bar', function () use ($app) {
    $data = [ 'group' => 'hrphp' ];
    $app
        ->setLayout('master')
        ->setPartial('index/index')
        ->render($data);
});

```
