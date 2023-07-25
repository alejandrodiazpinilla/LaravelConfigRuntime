<?php

namespace Rmunate\Server;

use Illuminate\Support\Facades\Config;
use Rmunate\Server\Bases\BaseLaravelRunTime;

class LaravelRuntime extends BaseLaravelRunTime
{
    /**
     * The prefix for configuration keys.
     *
     * @var string
     */
    private $prefix;

    /**
     * LaravelRuntime constructor.
     *
     * @param string $prefix The prefix to be added to configuration keys.
     */
    public function __construct(string $prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * Set a configuration option with the specified value.
     *
     * @param string $prop The name of the configuration option.
     * @param mixed $value The value to set for the option.
     * @return bool True if the option was set successfully, false otherwise.
     */
    public function set($prop, $value): bool
    {
        if (empty($prop)) {
            $prop = str_replace('..', '.', trim($this->prefix, '.'));
            return Config::set($prop, $value) !== false;
        }
        return Config::set($this->prefix . $prop, $value) !== false;
    }

    /**
     * Get the value of a configuration option.
     *
     * @param string $prop The name of the configuration option.
     * @return mixed|null The value of the configuration option, or null if not found.
     */
    public function get($prop = '')
    {
        if (empty($prop)) {
            $prop = str_replace('..', '.', trim($this->prefix, '.'));
            return Config::get($prop);
        }
        return Config::get($this->prefix . $prop);
    }
}
