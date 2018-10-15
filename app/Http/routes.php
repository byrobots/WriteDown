<?php

// Admin login. The only admin route that doesn't require authentication.
$writedown
    ->getRouter()
    ->get('/admin/login', 'Admin\AuthController::loginForm');

/**
 * API Routes.
 *
 * These expose the HTTP API used for making asyncronous requests in the
 * frontend. Not to be confused with the API provided by the writedown-core
 * package.
 */
$writedown
    ->getRouter()
    ->group('/api', function ($route) use ($apiCsrfMiddleware) {
        // Authenticates login credentials.
        $route
            ->post('/login', 'API\AuthController::validateLogin')
            ->middleware($apiCsrfMiddleware);
    });

/**
 * Logged in administration routes.
 */
$writedown
    ->getRouter()
    ->group('/admin', function ($route) use ($csrfMiddleware) {
        $route->get('/dashboard', 'Admin\DashboardController::index');

        $route->get('/posts', 'Admin\PostController::index');
    })->middleware($authMiddleware);
