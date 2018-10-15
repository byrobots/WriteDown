<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

class PostController extends BaseController
{
    /**
     * Show the post index page. This is a list of all posts in the database.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        return $this->respond('admin/post/index.twig', [
            'csrf'  => $this->csrf->get(),
        ]);
    }
}
