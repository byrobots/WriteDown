<?php

/**
 * Admin login routes.
 */
$writedown->getRouter()
    ->get('/admin/login', 'Admin\AuthController::loginForm');

$writedown->getRouter()
    ->post('/admin/login', 'Admin\AuthController::validateLogin')
    ->middleware($csrfMiddleware);

/**
 * Logged in administration routes.
 */
$writedown->getRouter()->group('/admin', function ($route) {
    $route->get('/', 'Admin\DashboardController::index');
})->middleware($authMiddleware);
