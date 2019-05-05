<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Returns an object for writing to a log. Usage: logger()->info('Foo');
 *
 * @return \Monolog\Logger
 */
function logger(): Logger
{
    $log = new Logger('writedown');
    $log->pushHandler(
        new StreamHandler(
            sprintf('%s/logs/writedown.log', env('ROOT_PATH', realpath('../..'))),
            Logger::WARNING
        )
    );

    return $log;
}
