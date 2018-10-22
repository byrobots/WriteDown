<?php

$router = $writedown->getRouter();

// Admin login. The only admin route that doesn't require authentication.
$router->get('/admin/login', 'Admin\AuthController::loginForm');

/**
 * API Routes.
 *
 * These expose the HTTP API used for making asyncronous requests in the
 * frontend. Not to be confused with the API provided by the writedown-core
 * package.
 */
 $router
    ->post('/api/login', 'API\AuthController::validateLogin')
    ->middleware($apiCsrfMiddleware);

$router
    ->group('/api', function ($route) use ($apiCsrfMiddleware) {
        $route->post('/posts/store', 'Admin\PostController::store');
    })->middleware($authMiddleware);

/**
 * Logged in administration routes.
 */
$router
    ->group('/admin', function ($route) use ($csrfMiddleware) {
        $route->get('/dashboard', 'Admin\DashboardController::index');

        $route->get('/posts', 'Admin\PostController::index');
        $route->get('/posts/new', 'Admin\PostController::create');
    })->middleware($authMiddleware);
