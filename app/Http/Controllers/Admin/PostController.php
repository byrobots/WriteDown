<?php

namespace App\Http\Controllers\Admin;

use WriteDown\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * List all posts.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        return $this->view->render($this->response, 'admin/post/index.php', [
            'posts' => $this->api->post()->index(),
        ]);
    }

    /**
     * Show the creation form.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create()
    {
        return $this->view->render($this->response, 'admin/post/create.php', [
            'csrf' => $this->csrf->get(),
        ]);
    }
}
