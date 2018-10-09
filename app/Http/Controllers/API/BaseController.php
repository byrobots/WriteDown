<?php

namespace App\Http\Controllers\API;

use ByRobots\WriteDown\Http\Controllers\Controller;
use App\Library\APIResponse;

class BaseController extends Controller
{
    /**
     * For responding to API requests.
     *
     * @var \App\Library\APIResponse
     */
    protected $response;

    /**
     * Construct the controller.
     */
    public function __construct()
    {
        $this->response = new APIResponse;
    }
}
