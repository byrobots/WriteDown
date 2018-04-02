<?php

$writedown->getRouter()
    ->get('/admin/login', 'Admin\AuthController::loginForm');

$writedown->getRouter()
    ->post('/admin/login', 'Admin\AuthController::validateLogin')
    ->middleware($csrfMiddleware);
