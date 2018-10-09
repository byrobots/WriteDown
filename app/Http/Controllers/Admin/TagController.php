<?php

namespace App\Http\Controllers\Admin;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

class TagController extends CRUDController
{
    /**
     * Set-up CRUDController.
     *
     * @param \Slim\Views\PhpRenderer $view
     */
    public function __construct(PhpRenderer $view)
    {
        parent::__construct($view);

        $this->viewFolder   = 'tag';
        $this->resourcePath = 'tags';
        $this->endpoint     = 'tag';
    }
}
