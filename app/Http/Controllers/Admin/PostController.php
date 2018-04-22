<?php

namespace App\Http\Controllers\Admin;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

class PostController extends CRUDController
{
    /**
     * Set-up CRUDController.
     *
     * @param \Slim\Views\PhpRenderer $view
     */
    public function __construct(PhpRenderer $view)
    {
        parent::__construct($view);

        $this->viewFolder   = 'post';
        $this->resourcePath = 'posts';
        $this->endpoint     = 'post';
    }

    /**
     * @inheritDoc
     */
    public function store()
    {
        $this->data = $this->request->getParsedBody();
        $this->setPublishAt();

        return parent::store();
    }

    /**
     * @inheritDoc
     */
    public function update(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $this->data = $this->request->getParsedBody();
        $this->setPublishAt();

        return parent::update($request, $response, $args);
    }

    /**
     * Set the publish_at data.
     *
     * @return void
     */
    private function setPublishAt()
    {
        if (!isset($this->data['publish_at']) or empty($this->data['publish_at'])) {
            $this->data['publish_at'] = null;
            return;
        }

        $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $this->data['publish_at']);
        $errors   = \DateTime::getLastErrors();

        if (!empty($errors['warning_count'])) {
            $this->data['publish_at'] = null;
            return;
        }

        $this->data['publish_at'] = $dateTime;
    }
}
