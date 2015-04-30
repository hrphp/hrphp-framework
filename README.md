# hrphp-framework
A tutorial project for developers interested in learning more about PHP web development frameworks.


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