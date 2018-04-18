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
    public function store()
    {
        $this->data = $this->request->getParsedBody();

        if (!empty($this->data['password'])) {
            $this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);
        }

        return parent::store();
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

        if (array_key_exists('password', $this->data)) {
            $this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);
        }

        return parent::update($request, $response, $args);
    }
}
