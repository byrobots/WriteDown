<?php

namespace App\Library;

use Zend\Diactoros\Response\JsonResponse;

class APIResponse
{
    /**
     * Was the request successful?
     *
     * @var boolean
     */
    private $success = true;

    /**
     * The data to return.
     *
     * @var mixed
     */
    private $data = null;

    /**
     * The status code for the response.
     *
     * @var int
     */
    private $statusCode = 200;

    /**
     * Headers to respond with.
     *
     * @var array
     */
    private $headers = [];

    /**
     * Response meta data.
     *
     * @var array
     */
    private $meta = null;

    /**
     * Set the success status.
     *
     * @param boolean $status
     *
     * @return self
     * @throws \Exception
     */
    public function setSuccess($success) {
        if (is_bool($success)) {
            throw new \Exception('Invalid success status received.');
        }

        $this->success = $success;
        return $this;
    }

    /**
     * Set the data to return.
     *
     * @param mixed $data
     *
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Set the status code to respond with.
     *
     * @param int $statusCode
     *
     * @return self
     * @throws \Exception
     */
    public function setStatusCode($statusCode)
    {
        if (!is_int($statusCode)) {
            throw new \Exception('Invalid status code received.');
        }

        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Set the headers to respond with.
     *
     * @param array $headers
     *
     * @return self
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * Set the response meta data.
     *
     * @param array $meta
     *
     * @return self
     */
    public function setMeta(array $meta)
    {
        $this->meta = $meta;
        return $this;
    }

    /**
     * Render a template and return a response.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function respond()
    {
        $data          = new \stdClass;
        $data->success = $this->success;
        $data->data    = $this->data;
        $data->meta    = $this->meta;

        return new JsonResponse($data, $this->statusCode, $this->headers);
    }
}
