<?php

namespace Rmunate\LaravelConfigRuntime\Exceptions;

use Exception;
use Throwable;

class ConfigException extends Exception
{
    public static function catch($message, $code = 0, Throwable $previous = null)
    {
        return new static($message, $code, $previous);
    }
}