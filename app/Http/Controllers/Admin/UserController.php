<?php

namespace App\Http\Controllers\Admin;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UserController extends CRUDController
{
    /**
     * Set-up CRUDController.
     */
    public function __construct()
    {
        $this->viewFolder   = 'user';
        $this->resourcePath = 'users';
        $this->endpoint     = 'user';
    }

    /**
     * @inheritDoc
     */
    public function update(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $this->data = $this->request->getParsedBody();

        if (empty($this->data['password'])) {
            unset($this->data['password']);
        }

        return parent::update($request, $response, $args);
    }
}
