<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Zend\Diactoros\Response\RedirectResponse;

class RootController extends BaseController
{
    /**
     * When the user requests /admin send them to the login form if they're
     * not logged in, or the post index if they are.
     */
    public function onYourWay()
    {
        if ($this->isAuthenticated()) {
            return new RedirectResponse('/admin/posts');
        }

        return new RedirectResponse('/admin/login');
    }
}
