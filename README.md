# hrphp-framework
A tutorial project for developers interested in learning more about PHP web development frameworks.

```php
$app = new \Hrphp\Application();
$app->get('/foo', function () use ($app) {
    $app->render();
});

$app->get('/bar', function () use ($app) {
    $data = [ 'group' => 'hrphp' ];
    $app
        ->setLayout('master')
        ->setView('index/index')
        ->render($data);
});

$app->

```