<?php

namespace App\Http\Controllers\Admin;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use WriteDown\Http\Controllers\Controller;
use Zend\Diactoros\Response\RedirectResponse;

/**
 * Provides a simple, reusable, CRUD interface for resources.
 */
class CRUDController extends Controller
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
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        $resources = $this->api->{$this->endpoint}()->index([
            'where'      => [],
            'pagination' => [
                'current_page' => 1,
                'per_page'     => getenv('MAX_ITEMS'),
            ],
        ]);

        return $this->view->render($this->response, 'admin/' . $this->viewFolder . '/index.php', [
            'error'     => $this->sessions->getFlash('error'),
            'resources' => $resources,
            'success'   => $this->sessions->getFlash('success'),
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
            'errors' => $this->sessions->getFlash('errors') ?: [],
            'old'    => $this->sessions->getFlash('old')    ?: [],
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
            $this->sessions
                ->setFlash('success', 'The new ' . $this->viewFolder . ' has been saved.');

            return new RedirectResponse('/admin/' . $this->resourcePath);
        }

        $this->sessions->setFlash('errors', $result['data']);
        $this->sessions->setFlash('old', $this->data);
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
            $this->sessions->setFlash('error', 'Sorry, that ' . $this->viewFolder . ' was not found.');
            return new RedirectResponse('/admin/' . $this->resourcePath);
        }

        return $this->view->render($this->response, 'admin/' . $this->viewFolder . '/edit.php', [
            'csrf'     => $this->csrf->get(),
            'errors'   => $this->sessions->getFlash('errors') ?: [],
            'old'      => $this->sessions->getFlash('old')    ?: [],
            'resource' => $resource,
            'success'  => $this->sessions->getFlash('success'),
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
            $this->sessions
                ->setFlash('success', 'The ' . $this->viewFolder . ' has been updated.');

            return new RedirectResponse('/admin/' . $this->resourcePath);
        }

        if ($result['data'] == ['Not found.']) {
            $this->sessions->setFlash('error', 'That ' . $this->viewFolder . ' was not found.');
            return new RedirectResponse('/admin/' . $this->resourcePath);
        }

        $this->sessions->setFlash('errors', $result['data']);
        $this->sessions->setFlash('old', $this->data);
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
            $this->sessions
                ->setFlash('success', 'The ' . $this->viewFolder . ' has been deleted.');

            return new RedirectResponse('/admin/' . $this->resourcePath);
        }

        $this->sessions->setFlash('error', 'The ' . $this->viewFolder . ' doesn&rsquo;t exist.');
        return new RedirectResponse('/admin/' . $this->resourcePath);
    }
}
