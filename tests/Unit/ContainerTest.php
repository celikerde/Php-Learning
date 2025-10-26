<?php

use Core\Container;

test('it can resolve a class from the container', function () {
    $container = new Container();
    $container->bind('foo', fn() => 'bar');
    $result = $container->resolve('foo');
    expect($result)->toBe('bar');
});