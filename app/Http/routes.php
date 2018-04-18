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
$writedown->getRouter()->group('/admin', function ($route) use ($csrfMiddleware) {
    // Log the user out
    $route->get('/logout', 'Admin\AuthController::logout');

    // Admin dashboard
    $route->get('/', 'Admin\DashboardController::index');

    // Posts CRUD
    $route->get('/posts', 'Admin\PostController::index');

    $route->get('/posts/new', 'Admin\PostController::create');
    $route->post('/posts', 'Admin\PostController::store')
        ->middleware($csrfMiddleware);

    $route->get('/posts/{resourceID}', 'Admin\PostController::edit');
    $route->post('/posts/{resourceID}', 'Admin\PostController::update')
        ->middleware($csrfMiddleware);

    $route->get('/posts/{resourceID}/delete', 'Admin\PostController::delete');

    // Users CRUD
    $route->get('/users', 'Admin\UserController::index');

    $route->get('/users/new', 'Admin\UserController::create');
    $route->post('/users', 'Admin\UserController::store')
        ->middleware($csrfMiddleware);

    $route->get('/users/{resourceID}', 'Admin\UserController::edit');
    $route->post('/users/{resourceID}', 'Admin\UserController::update')
        ->middleware($csrfMiddleware);

    $route->get('/users/{resourceID}/delete', 'Admin\UserController::delete');
})->middleware($authMiddleware);
