<?php

/**
 * Create the application container.
 */
$container = new League\Container\Container;

/**
 * Define core services.
 */
$container->share('response', Zend\Diactoros\Response::class);

$container->share('request', function () {
    return Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
});

$container->share('emitter', Zend\Diactoros\Response\SapiEmitter::class);

$container->share('routes', new League\Route\RouteCollection);

/**
 * Jump back to processing the request.
 */
return new WriteDown\WriteDown($container);
