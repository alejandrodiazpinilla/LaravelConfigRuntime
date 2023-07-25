# PhpRunTime: Fine-tune your PHP configuration on the Fly!

The `PhpRunTime` Library provides methods for managing PHP configuration at runtime. It allows you to set, get, and restore configuration options, as well as check their existence and status.

![RUNTIME_PHP](https://github.com/rmunate/PHPInfoServer/assets/91748598/873f40e0-9278-4a82-a50c-5baef7b7691a)

## Table of Contents
1. [Installation](#installation)
2. [Available Methods](#available-methods)
3. [Usage Examples](#usage-examples)
   - [Set a Configuration Option](#set-a-configuration-option)
   - [Get the Value of a Configuration Option](#get-the-value-of-a-configuration-option)
   - [Restore a Configuration Option](#restore-a-configuration-option)
   - [Restore All Configuration Options](#restore-all-configuration-options)
4. [Clarifications](#clarifications)
5. [Creator](#creator)
6. [License](#license)

## Installation
To install the package via Composer, run the following command:

```shell
composer require rmunate/php-config-runtime
```

## Available Methods

| Method | Description |
| - | - |
| `PhpRunTime::set($option, $value)` | Sets the value of a PHP configuration option at runtime using `ini_set()`. |
| `PhpRunTime::get($option)` | Gets the current value of a PHP configuration option. If the option is not set or found, returns `null`. |
| `PhpRunTime::restore($option)` | Restores a PHP configuration option to its default value. Returns `true` if the restoration is successful, or `false` otherwise. |
| `PhpRunTime::restoreAll()` | Restores all PHP configuration options to their default values. Returns `true` if all restorations are successful, or `false` otherwise. |
| `PhpRunTime::isOptionSet($option)` | Checks if a configuration option is set and has a non-empty value. Returns `true` if the option is set, or `false` otherwise. |
| `PhpRunTime::doesOptionExist($option)` | Checks if a configuration option exists in the `php.ini` file. Returns `true` if the option exists, or `false` otherwise. |

## Usage Examples

#### Set a Configuration Option

```php
use Rmunate\Server\PhpRunTime;

// Set the "display_errors" option to "On"
PhpRunTime::set('display_errors', 'On');

// Check if the option is set and has a non-empty value
if (PhpRunTime::isOptionSet('display_errors')) {
    // 'The "display_errors" option is enabled.';
} else {
    // 'The "display_errors" option is not set.';
}
```

#### Get the Value of a Configuration Option

```php
use Rmunate\Server\PhpRunTime;

// Get the current value of the "max_execution_time" option
$maxExecutionTime = PhpRunTime::get('max_execution_time');

if ($maxExecutionTime !== null) {
    // "The current value of 'max_execution_time' is: $maxExecutionTime seconds.";
} else {
    // "The 'max_execution_time' option is not set.";
}
```

#### Restore a Configuration Option

```php
use Rmunate\Server\PhpRunTime;

// Temporarily set the "memory_limit" option to "256M"
PhpRunTime::set('memory_limit', '256M');

// Restore the "memory_limit" option to its default value
PhpRunTime::restore('memory_limit');

// Check if the option is set and has a non-empty value
if (PhpRunTime::isOptionSet('memory_limit')) {
    // 'The "memory_limit" option is set.';
} else {
    // 'The "memory_limit" option is not set.';
}
```

#### Restore All Configuration Options

```php
use Rmunate\Server\PhpRunTime;

// Temporarily set some configuration options
PhpRunTime::set('display_errors', 'On');
PhpRunTime::set('error_reporting', E_ALL);

// Restore all options to their default values
PhpRunTime::restoreAll();

// Check if the options are set and have non-empty values
if (PhpRunTime::isOptionSet('display_errors') || PhpRunTime::isOptionSet('error_reporting')) {
    // 'Some options could not be restored.';
} else {
    // 'All options were successfully restored.';
}
```

## Clarifications

- Changes made using the `set()` method are only valid during the execution of the current script and do not affect the `php.ini` file. To make permanent changes, it's necessary to manually edit the `php.ini` file.

- Some configuration options may be disabled in shared hosting environments, which may limit the ability to change certain configurations.

- It's important to be cautious when modifying PHP configuration, as some changes can affect the performance and security of applications. It's recommended to consult the official PHP documentation for detailed information on each configuration option.

## Creator
- 🇨🇴 Raúl Mauricio Uñate Castro
- Email: raulmauriciounate@gmail.com

## License
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
