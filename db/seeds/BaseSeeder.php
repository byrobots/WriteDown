<?php

use Phinx\Seed\AbstractSeed;

class BaseSeeder extends AbstractSeed
{
    /**
     * Initialise WriteDown.
     *
     * @return void
     */
    protected function init()
    {
        require_once __DIR__ . '/../../boot/start.php';
    }
}
