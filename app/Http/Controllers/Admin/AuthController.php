<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

class AuthController extends BaseController
{
    /**
     * Show the login form.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function loginForm()
    {
        return $this->respond('admin/auth/login.twig', [
            'csrf' => $this->writedown->getService('csrf')->get(),
        ]);
    }
}
