<?php

namespace Rmunate\LaravelConfigRuntime\Bases;

/**
 * BaseLaravel Class
 *
 * This abstract class serves as the base for creating Laravel configuration-related classes.
 * It provides a static method `config()` that can be used to instantiate a new instance of the extending class.
 * By extending this class, you can implement your own configuration logic and methods.
 */
abstract class BaseLaravel
{
    /**
     * Create a new instance of the extending class.
     *
     * This static method is used to instantiate a new instance of the class that extends BaseLaravel.
     * It allows for a fluent and expressive syntax when interacting with the configuration class.
     * By calling `BaseLaravel::config()`, you can create an instance of the extending class.
     *
     * @return static
     */
    public static function config()
    {
        return new static();
    }
}
