<?php

namespace App\Http\Controllers\Admin;

use WriteDown\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * WriteDown's dashboard.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        die('Logged in!');
    }
}
