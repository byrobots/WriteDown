<?php

namespace App\Http\Controllers;

use WriteDown\Http\Controller;

class TestController extends Controller
{
    /**
     * Test controllers work.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        return $this->view->render($this->response, 'test.php', []);
    }
}
