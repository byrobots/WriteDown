<?php

$writedown->getRouter()
    ->map('GET', '/admin/login', 'Admin\AuthController::loginForm');
