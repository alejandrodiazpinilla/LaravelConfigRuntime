<?php

namespace Rmunate\LaravelConfigRuntime\Exceptions;

use Exception;
use Throwable;

/**
 * Class ConfigException.
 *
 * Custom exception class for handling runtime configuration errors in Laravel.
 */
class ConfigException extends Exception
{
    /**
     * Create a new ConfigException instance.
     *
     * @param string    $message
     * @param int       $code
     * @param Throwable $previous
     *
     * @return ConfigException
     */
    public static function catch($message, $code = 0, Throwable $previous = null)
    {
        return new static($message, $code, $previous);
    }
}
