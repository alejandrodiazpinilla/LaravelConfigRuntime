<?php

namespace Rmunate\Server\Bases;

abstract class BaseLaravelRunTime
{
    /**
     * Get the prefix for the configuration key.
     *
     * @param string|null $string The string to append as a prefix (optional).
     * @return string The formatted prefix.
     */
    private static function prefix($string = null)
    {
        if (!empty($string)) {
            // Remove duplicate dots and trim dots from the beginning and end of the string
            $prefix = str_replace('..', '.', trim($string, '.'));
            return  $prefix . '.';
        }
        return '';
    }

    /**
     * Get the configuration instance with the 'app' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'app' prefix.
     */
    public static function app($string = null)
    {
        return new static('app.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'auth' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'auth' prefix.
     */
    public static function auth($string = null)
    {
        return new static('auth.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'broadcasting' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'broadcasting' prefix.
     */
    public static function broadcasting($string = null)
    {
        return new static('broadcasting.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'cache' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'cache' prefix.
     */
    public static function cache($string = null)
    {
        return new static('cache.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'cors' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'cors' prefix.
     */
    public static function cors($string = null)
    {
        return new static('cors.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'database' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'database' prefix.
     */
    public static function database($string = null)
    {
        return new static('database.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'filesystems' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'filesystems' prefix.
     */
    public static function filesystems($string = null)
    {
        return new static('filesystems.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'hashing' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'hashing' prefix.
     */
    public static function hashing($string = null)
    {
        return new static('hashing.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'logging' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'logging' prefix.
     */
    public static function logging($string = null)
    {
        return new static('logging.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'mail' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'mail' prefix.
     */
    public static function mail($string = null)
    {
        return new static('mail.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'queue' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'queue' prefix.
     */
    public static function queue($string = null)
    {
        return new static('queue.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'sanctum' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'sanctum' prefix.
     */
    public static function sanctum($string = null)
    {
        return new static('sanctum.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'services' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'services' prefix.
     */
    public static function services($string = null)
    {
        return new static('services.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'session' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'session' prefix.
     */
    public static function session($string = null)
    {
        return new static('session.' . self::prefix($string));
    }

    /**
     * Get the configuration instance with the 'view' prefix.
     *
     * @param string|null $string The string to append to the prefix (optional).
     * @return static The instance with the 'view' prefix.
     */
    public static function view($string = null)
    {
        return new static('view.' . self::prefix($string));
    }

}
