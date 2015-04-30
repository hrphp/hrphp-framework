# The HRPHP Framework
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