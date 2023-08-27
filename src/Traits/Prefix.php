<?php

namespace Rmunate\LaravelConfigRuntime\Traits;

trait Prefix
{
    /**
     * Generate the configuration prefix.
     *
     * This method combines the values of the `$section` and `$prefix`, separated by a dot,
     * and removes any white spaces. It also ensures that there are no duplicate dots in the resulting prefix.
     *
     * @param string      $prefix
     * @param string|null $section
     *
     * @return string
     */
    public function generatePrefix($prefix, $section = null)
    {
        // Combine the values of the section and prefix, separated by a dot, and remove any white spaces
        $finalPrefix = (!empty($section)) ? $section.'.'.$prefix : $prefix;
        $finalPrefix = str_replace(' ', '', $finalPrefix);

        // Remove duplicate dots and dots at the beginning or end of the string
        $finalPrefix = preg_replace('/\.+/', '.', $finalPrefix);
        $finalPrefix = trim($finalPrefix, '.');

        // Return the final prefix
        return $finalPrefix;
    }
}
