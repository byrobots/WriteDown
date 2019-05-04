<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Returns an object for writing to a log. Usage: writeLog()->info('Foo');
 *
 * @return \Monolog\Logger
 */
function writeLog()
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
