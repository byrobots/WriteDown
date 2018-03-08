<?php

/**
 * Create the application container.
 */
$container        = new Pimple\Container;
$container['app'] = function ($c) {
    return new WriteDown\WriteDown;
};

/**
 * Define core services.
 */
$container['response'] = function ($c) {
    return new Zend\Diactoros\Response;
};

$container['request'] = function ($c) {
    return Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
};

$container['emitter'] = function ($c) {
    return new Zend\Diactoros\Response\SapiEmitter;
};

$container['router'] = function ($c) {
    return new League\Route\RouteCollection;
};

/**
 * Jump back to processing the request.
 */
return $container;
