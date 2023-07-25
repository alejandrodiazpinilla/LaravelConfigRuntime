<?php

namespace Rmunate\LaravelConfigRuntime;

use Rmunate\LaravelConfigRuntime\Classes\Laravel;

class LaravelRuntime
{
    /**
     * Get an instance of the Laravel configuration wrapper.
     *
     * This method returns an instance of the `Laravel` class, which
     * is a wrapper around Laravel's configuration repository. You can
     * use this instance to interact with Laravel's configuration.
     *
     * @return \Rmunate\LaravelConfigRuntime\Classes\Laravel An instance of the `Laravel` class.
     */
    public static function config()
    {
        return Laravel::config();
    }
}
