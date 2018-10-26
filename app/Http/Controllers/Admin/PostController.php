<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\RedirectResponse;

class PostController extends BaseController
{
    /**
     * Retrieve all posts.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param array                                    $args Modifiers for requesting posts. Think pagination.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args = [])
    {
        $posts = $this->api->post()->index([
            'where'      => [],
            'pagination' => [
                'current_page' => array_key_exists('page', $args) ? $args['page'] : 1,
                'per_page'     => env('MAX_ITEMS', 10),
            ],
        ]);

        return $this->respond('admin/post/index.twig', [
            'csrf'  => $this->csrf->get(),
            'meta'  => $posts['meta'],
            'posts' => $posts['data'],
        ]);
    }

    /**
     * Show the new post page.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create()
    {
        return $this->respond('admin/post/create.twig', [
            'csrf'   => $this->csrf->get(),
            'errors' => $this->session->getFlash('errors') ?: [],
            'old'    => $this->session->getFlash('old')    ?: [],
        ]);
    }

    /**
     * Delete a post.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param array                                    $args
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $result = $this->api->post()->delete($args['postID']);
        if ($result['success']) {
            $this
                ->session
                ->setFlash('success', 'The post has been deleted.');
        } else {
            $this
                ->session
                ->setFlash('error', 'The post doesn&rsquo;t exist.');
        }

        return new RedirectResponse('/admin/posts');
    }
}
