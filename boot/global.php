<?php

if (!function_exists('writedown')) {
    /**
     * Provides access to the WriteDown object.
     *
     * @return \ByRobots\WriteDown\WriteDown
     */
    function writedown()
    {
        return new ByRobots\WriteDown\WriteDown(new League\Container\Container);
    }
}
