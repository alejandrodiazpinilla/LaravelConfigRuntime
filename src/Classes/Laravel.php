<?php

namespace Rmunate\LaravelConfigRuntime\Classes;

use Rmunate\LaravelConfigRuntime\Bases\BaseLaravel;
use Rmunate\LaravelConfigRuntime\Exceptions\ConfigException;
use Rmunate\LaravelConfigRuntime\Traits\Prefix;
use Rmunate\LaravelConfigRuntime\Traits\Repository;
use Rmunate\LaravelConfigRuntime\Traits\Utilities;

class Laravel extends BaseLaravel
{
    use Utilities;
    use Prefix;
    use Repository;

    /**
     * Instance of the configuration repository.
     *
     * @var \Illuminate\Contracts\Config\Repository
     */
    protected $config;

    /**
     * File prefix to use for configuration retrieval.
     *
     * @var string|null
     */
    protected $file;

    /**
     * Constructor to create a new instance of Laravel configuration class.
     *
     * Here, we create an instance of the Laravel configuration repository using the trait method `instance()`.
     */
    public function __construct()
    {
        $this->config = $this->instance();
    }

    /**
     * Get all configuration values as an array.
     *
     * @return array
     */
    public function all()
    {
        return $this->config->all();
    }

    /**
     * Set the file to be used for configuration retrieval.
     *
     * @param string $file
     *
     * @throws ConfigException
     *
     * @return $this
     */
    public function file(string $file)
    {
        if (!$this->validateFileName($file)) {
            throw ConfigException::catch('The supplied file name is not valid. It must not have the extension, and should not contain spaces, periods, or accents.');
        }

        $this->file = $file;

        return $this;
    }

    /**
     * Get a configuration value or the default value if not found.
     *
     * @param string $route
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get(string $route = '', $default = null)
    {
        $data = $this->generatePrefix($route, $this->file);

        return (empty($data)) ? $this->all() : $this->config->get($data, $default);
    }

    /**
     * Get a configuration value or throw an exception if not found.
     *
     * @param string $route
     * @param mixed  $default
     *
     * @throws ConfigException
     *
     * @return mixed
     */
    public function getOrFail(string $route = '', $default = null)
    {
        $data = $this->generatePrefix($route, $this->file);
        if (!$this->config->has($data)) {
            throw ConfigException::catch("The '".$data."' configuration property is not defined in the framework.");
        }

        return (empty($data)) ? $this->all() : $this->config->get($data, $default);
    }

    /**
     * Get multiple configuration values at once.
     *
     * @param mixed ...$indexes
     *
     * @return array
     */
    public function getMany(...$indexes)
    {
        $indexes = (is_array($indexes[0]) && count($indexes[0]) > 0) ? $indexes[0] : $indexes;

        return $this->config->getMany($indexes);
    }

    /**
     * Check if a configuration property exists.
     *
     * @param string $route
     *
     * @return bool
     */
    public function has(string $route = '')
    {
        $data = $this->generatePrefix($route, $this->file);

        return $this->config->has($data);
    }

    /**
     * Check if multiple configuration properties exist.
     *
     * @param mixed ...$indexes
     *
     * @return array
     */
    public function hasMany(...$indexes)
    {
        $indexes = (is_array($indexes[0]) && count($indexes[0]) > 0) ? $indexes[0] : $indexes;

        $data = [];
        foreach ($indexes as $index) {
            $data[$index] = $this->config->has($index);
        }

        return $data;
    }

    /**
     * Set a configuration value.
     *
     * @param string $route
     * @param mixed  $value
     *
     * @return bool
     */
    public function set(string $route = '', $value = null)
    {
        $data = $this->generatePrefix($route, $this->file);

        return (empty($data)) ? false : $this->config->set($data, $value) !== false;
    }

    /**
     * Unset a configuration value.
     *
     * @param string $route
     *
     * @return bool
     */
    public function unset(string $route = '')
    {
        $data = $this->generatePrefix($route, $this->file);

        return (empty($data)) ? false : $this->config->set($data, null) !== false;
    }
}
