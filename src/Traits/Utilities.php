<?php

namespace Rmunate\LaravelConfigRuntime\Traits;

trait Utilities
{
    /**
     * Convert an array to an object.
     *
     * This method takes an array and converts it into an object.
     * It uses json_encode to convert the array to a JSON string
     * and then json_decode with the second argument set to false
     * to convert it back to an object. This is an efficient way
     * to convert arrays to objects while preserving any non-ASCII
     * characters (such as accented characters).
     *
     * @param array $data The array to convert to an object.
     * @return object The object representation of the input array.
     */
    public function toObject($data)
    {
        return json_decode(json_encode($data), false);
    }

    /**
     * Validate a filename.
     *
     * This method validates that the given string (filename)
     * does not contain dots (.), accented characters, or spaces.
     * It uses strpos to check for the presence of dots and spaces
     * in the string and preg_match to check for accented characters
     * using a regular expression. The method returns true if the
     * filename is valid (does not contain dots, accented characters,
     * or spaces) and false otherwise.
     *
     * @param string $cadena The filename to validate.
     * @return bool True if the filename is valid, false otherwise.
     */
    public function validateFileName($cadena)
    {
        // Validar que la cadena no contenga puntos (.)
        if (strpos($cadena, '.') !== false) {
            return false;
        }

        // Validar que la cadena no contenga acentos
        if (preg_match('/[áéíóúÁÉÍÓÚ]/', $cadena)) {
            return false;
        }

        // Validar que la cadena no contenga espacios
        if (strpos($cadena, ' ') !== false) {
            return false;
        }

        // La cadena es válida
        return true;
    }
}
