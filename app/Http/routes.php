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

    $route->get('/posts/{postID}', 'Admin\PostController::edit');
    $route->post('/posts/{postID}', 'Admin\PostController::update')
        ->middleware($csrfMiddleware);

    $route->get('/posts/{postID}/delete', 'Admin\PostController::delete');
})->middleware($authMiddleware);
