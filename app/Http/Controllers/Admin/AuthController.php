<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Zend\Diactoros\Response\RedirectResponse;

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
            'csrf'  => $this->csrf->get(),
        ]);
    }
}
