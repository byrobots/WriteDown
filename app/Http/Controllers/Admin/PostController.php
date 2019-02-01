<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

class PostController extends BaseController
{
    /**
     * Display the post index.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        return $this->respond('admin/post/index.twig', [
            'csrf'  => $this->writedown->getService('csrf')->get(),
        ]);
    }

    /**
     * Show the new post page.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create()
    {
        $csrf   = $this->writedown->getService('csrf')->get();
        $old    = $this->writedown->getService('session')->getFlash('old') ?: [];
        $errors = $this->writedown
            ->getService('session')
            ->getFlash('errors') ?: [];

        return $this->respond('admin/post/create.twig', [
            'csrf'   => $csrf,
            'errors' => $errors,
            'old'    => $old,
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
        $result = $this->writedown
            ->getService('api')
            ->post()
            ->delete($args['postID']);

        if ($result['success']) {
            $this->writedown
                ->getService('session')
                ->setFlash('success', 'The post has been deleted.');
            return new RedirectResponse('/admin/posts');
        }

        $this->writedown
            ->getService('session')
            ->setFlash('error', 'The post doesn&rsquo;t exist.');
        return new RedirectResponse('/admin/posts');
    }
}
