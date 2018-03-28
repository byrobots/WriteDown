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
        $this->response->getBody()
            ->write('<marquee>Doesn\'t look like anything to me.</marquee>');

        return $this->response;
    }
}
