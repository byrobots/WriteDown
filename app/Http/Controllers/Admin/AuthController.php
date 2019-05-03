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
        if ($this->isAuthenticated()) {
            return new RedirectResponse('/admin/posts');
        }

        return $this->respond('admin/auth/login.twig', [
            'csrf' => $this->writedown->getService('csrf')->get(),
        ]);
    }

    /**
     * Log the user out.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function logout()
    {
        $user = $this->writedown->getService('auth')->user(
            $this->writedown->getService('session')->get('auth_token')
        );

        $this->writedown->getService('api')
            ->user()
            ->update($user->id, ['token' => null]);

        $this->writedown->getService('session')->destroy();

        return new RedirectResponse('/admin/login');
    }
}
