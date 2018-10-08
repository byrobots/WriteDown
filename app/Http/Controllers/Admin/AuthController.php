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

    /**
     * Log the user out.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function logout()
    {
        $user = $this->loggedInAs();
        $this->api->user()->update($user->id, ['token' => null]);
        $this->session->destroy();

        return new RedirectResponse('/');
    }
}
