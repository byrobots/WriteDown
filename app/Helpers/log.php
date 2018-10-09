<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Returns an object for writing to a log. Usage: log()->info('Foo');
 *
 * @return \Monolog\Logger
 */
function writeLog()
{
    $log = new Logger('writedown');
    $log->pushHandler(new StreamHandler(__DIR__ . '/../../logs/writedown.log', Logger::WARNING));

    return $log;
}
