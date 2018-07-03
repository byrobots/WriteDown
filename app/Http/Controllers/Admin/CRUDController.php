<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\RedirectResponse;

/**
 * Provides a simple, reusable, CRUD interface for resources.
 */
class CRUDController extends BaseController
{
    /**
     * The folder that contains views for this resource.
     *
     * @var string
     */
    protected $viewFolder;

    /**
     * The web path to the resource.
     *
     * @var string
     */
    protected $resourcePath;

    /**
     * The endpoint for this resource.
     *
     * @var string
     */
    protected $endpoint;

    /**
     * Pre-pared data.
     *
     * @var array
     */
    protected $data = [];

    /**
     * List all resources.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param array                                    $args
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $resources = $this->api->{$this->endpoint}()->index([
            'where'      => [],
            'pagination' => [
                'current_page' => array_key_exists('page', $args) ? $args['page'] : 1,
                'per_page'     => env('MAX_ITEMS', 10),
            ],
        ]);

        return $this->view->render($this->response, 'admin/' . $this->viewFolder . '/index.php', [
            'csrf'      => $this->csrf->get(),
            'error'     => $this->session->getFlash('error'),
            'resources' => $resources,
            'success'   => $this->session->getFlash('success'),
        ]);
    }

    /**
     * Show the creation form.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create()
    {
        return $this->view->render($this->response, 'admin/' . $this->viewFolder . '/create.php', [
            'csrf'   => $this->csrf->get(),
            'errors' => $this->session->getFlash('errors') ?: [],
            'old'    => $this->session->getFlash('old')    ?: [],
        ]);
    }

    /**
     * Save the new resource.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function store()
    {
        if (empty($this->data)) {
            $this->data = $this->request->getParsedBody();
        }

        $result = $this->api->{$this->endpoint}()->create($this->data);
        if ($result['success']) {
            $this->session
                ->setFlash('success', 'The new ' . $this->viewFolder . ' has been saved.');

            return new RedirectResponse('/admin/' . $this->resourcePath);
        }

        $this->session->setFlash('errors', $result['data']);
        $this->session->setFlash('old', $this->data);
        return new RedirectResponse('/admin/' . $this->resourcePath . '/new');
    }

    /**
     * Show the edit form.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param array                                    $args
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function edit(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $resource = $this->api->{$this->endpoint}()->read($args['resourceID']);
        if (!$resource['success']) {
            $this->session->setFlash('error', 'Sorry, that ' . $this->viewFolder . ' was not found.');
            return new RedirectResponse('/admin/' . $this->resourcePath);
        }

        return $this->view->render($this->response, 'admin/' . $this->viewFolder . '/edit.php', [
            'csrf'     => $this->csrf->get(),
            'errors'   => $this->session->getFlash('errors') ?: [],
            'old'      => $this->session->getFlash('old')    ?: [],
            'resource' => $resource,
            'success'  => $this->session->getFlash('success'),
        ]);
    }

    /**
     * Save changes.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param array                                    $args
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        if (empty($this->data)) {
            $this->data = $this->request->getParsedBody();
        }

        $result = $this->api->{$this->endpoint}()->update($args['resourceID'], $this->data);
        if ($result['success']) {
            $this->session
                ->setFlash('success', 'The ' . $this->viewFolder . ' has been updated.');

            return new RedirectResponse('/admin/' . $this->resourcePath);
        }

        if ($result['data'] == ['Not found.']) {
            $this->session->setFlash('error', 'That ' . $this->viewFolder . ' was not found.');
            return new RedirectResponse('/admin/' . $this->resourcePath);
        }

        $this->session->setFlash('errors', $result['data']);
        $this->session->setFlash('old', $this->data);
        return new RedirectResponse('/admin/' . $this->resourcePath . '/edit/' . $args['resourceID']);
    }

    /**
     * Delete a resource.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param array                                    $args
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $result = $this->api->{$this->endpoint}()->delete($args['resourceID']);
        if ($result['success']) {
            $this->session
                ->setFlash('success', 'The ' . $this->viewFolder . ' has been deleted.');

            return new RedirectResponse('/admin/' . $this->resourcePath);
        }

        $this->session->setFlash('error', 'The ' . $this->viewFolder . ' doesn&rsquo;t exist.');
        return new RedirectResponse('/admin/' . $this->resourcePath);
    }
}
