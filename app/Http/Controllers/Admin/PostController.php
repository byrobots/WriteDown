<?php

namespace App\Http\Controllers\Admin;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use WriteDown\API\Interfaces\APIInterface;
use Zend\Diactoros\Response\RedirectResponse;

class PostController extends CRUDController
{
    /**
     * Set-up CRUDController.
     */
    public function __construct()
    {
        $this->viewFolder   = 'post';
        $this->resourcePath = 'posts';
        $this->endpoint     = 'post';
    }

    /**
     * @inheritDoc
     */
    public function store()
    {
        $this->data               = $this->request->getParsedBody();
        $this->data['publish_at'] = new \DateTime($this->data['publish_at']);
        return parent::store();
    }

    /**
     * @inheritDoc
     */
    public function update(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $this->data               = $this->request->getParsedBody();
        $this->data['publish_at'] = new \DateTime($this->data['publish_at']);
        return parent::update($request, $response, $args);
    }
}
