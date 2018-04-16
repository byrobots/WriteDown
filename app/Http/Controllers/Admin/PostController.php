<?php

namespace App\Http\Controllers\Admin;

use WriteDown\Http\Controllers\Controller;
use Zend\Diactoros\Response\RedirectResponse;

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
            'posts' => $this->api->post()->index(['where' => []]),
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
            'csrf'   => $this->csrf->get(),
            'errors' => $this->sessions->getFlash('errors') ? $this->sessions->getFlash('errors') : [],
            'old'    => $this->sessions->getFlash('old') ? $this->sessions->getFlash('old') : [],
        ]);
    }

    /**
     * Save the new post.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function store()
    {
        $data      = $this->request->getParsedBody();
        $publishAt = new \DateTime($data['publish_at']);
        $result    = $this->api->post()->create([
            'title'      => $data['title'],
            'slug'       => $data['slug'],
            'excerpt'    => $data['excerpt'],
            'body'       => $data['body'],
            'publish_at' => $publishAt,
        ]);

        if ($result['success']) {
            $this->sessions
                ->setFlash('success', 'The new post, ' . $result['data']->title . ', has been saved.');

            return new RedirectResponse('/admin/posts');
        }

        $this->sessions->setFlash('errors', $result['data']);
        $this->sessions->setFlash('old', $data);
        return new RedirectResponse('/admin/posts/new');
    }
}
