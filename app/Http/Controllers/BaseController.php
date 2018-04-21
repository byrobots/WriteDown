<?php

namespace App\Http\Controllers;

use ByRobots\WriteDown\Http\Controllers\Controller;
use Slim\Views\PhpRenderer;

class BaseController extends Controller
{
    /**
     * @var \Slim\Views\PhpRenderer
     */
    protected $view;

    /**
     * Set-up.
     *
     * @param \Slim\Views\PhpRenderer $view
     *
     * @return void
     */
    public function __construct(PhpRenderer $view)
    {
        $this->view = $view;
    }
}
