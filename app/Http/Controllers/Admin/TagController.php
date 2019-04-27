<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class TagController extends BaseController
{
    /**
     * Display the tag index.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        $tags = $this->writedown->getService('api')->tag()->index([
            'pagination' => [],
        ]);

        return $this->respond('admin/tag/index.twig', [
            'csrf' => $this->writedown->getService('csrf')->get(),
            'tags' => $tags,
        ]);
    }
}
