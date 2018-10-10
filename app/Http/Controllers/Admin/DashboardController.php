<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

class DashboardController extends BaseController
{
    /**
     * Show the admin dashboard.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        die('Logged in!');
    }
}
