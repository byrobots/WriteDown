<?php

namespace App\Http\Controllers\API;

use ByRobots\WriteDown\Http\Controllers\Controller;
use App\Library\APIResponse;

class BaseController extends Controller
{
    /**
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
