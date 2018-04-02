<?php

$csrfMiddleware = new \WriteDown\HTTP\Middleware\CSRFMiddleware(
    $writedown->getContainer()->get('WriteDown\CSRF\CSRFInterface')
);

$writedown->getRouter()
    ->get('/admin/login', 'Admin\AuthController::loginForm');

$writedown->getRouter()
    ->post('/admin/login', 'Admin\AuthController::validateLogin')
    ->middleware([$csrfMiddleware, 'validate']);
