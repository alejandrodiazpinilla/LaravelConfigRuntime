# LaravelRuntime: Configure Laravel on the Fly!

The `LaravelRuntime` library empowers you to modify Laravel configuration values at runtime. It is essential to note that these changes will not affect the values in the `.env` file; they will only apply while executing scripts. Now, you can define each script with specific features, select which database to use, set cache methods, authentication settings, email configurations, and all other options.

![RUNTIME_LARAVEL](https://github.com/rmunate/PHPInfoServer/assets/91748598/b3f78d8b-9f01-4c81-8d08-a0f86791c4f9)

Below, we'll demonstrate various possible examples to showcase the extensive usability.

## Table of Contents

1. [Installation](#installation)
2. [Available Methods](#available-methods)
    - [Get All Configuration Data](#get-all-configuration-data)
    - [Get Configuration of a Specific File](#get-configuration-of-a-specific-file)
    - [Ways to Retrieve Values](#ways-to-retrieve-values)
    - [Throw Exception When Value Cannot Be Retrieved](#throw-exception-when-value-cannot-be-retrieved)
    - [Retrieve Multiple Values](#retrieve-multiple-values)
    - [Validate Existence of Configuration Value](#validate-existence-of-configuration-value)
    - [Validate Existence of Multiple Configuration Values](#validate-existence-of-multiple-configuration-values)
    - [Change Configuration Value](#change-configuration-value)
    - [Delete Configuration Value](#delete-configuration-value)
3. [Creator](#creator)
4. [License](#license)

## Installation

To install the package via Composer, execute the following command:

```shell
composer require rmunate/laravel-config-runtime
```

## Available Methods

Here, we'll showcase the possible uses of the library. It's straightforward and incredibly flexible, allowing you to master Laravel configuration with ease.

### Get All Configuration Data

If you want to obtain all the current configuration data in an associative array, you can easily do it as follows:

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// Main method
LaravelRuntime::config()->all();

// Alias of the previous method
LaravelRuntime::config()->get();
```

### Get Configuration of a Specific File

Remember that Laravel has a folder named "config," where various configuration files are stored. This package allows you to define which of these configuration files to consult.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// Get the complete configuration status of the defined file
LaravelRuntime::config()->file('app')->get();
```

### Ways to Retrieve Values

Now, if you want to access a specific value from the current Laravel configuration at runtime, you can use any of the following methods:

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// Define the file and then retrieve the value
LaravelRuntime::config()->file('app')->get('name');

// Without defining the file, use only the get method indicating the full path
LaravelRuntime::config()->get('app.name');
```

### Throw Exception When Value Cannot Be Retrieved

If necessary, you can throw an exception when attempting to retrieve a non-existent value in the framework's configuration.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// Define the file and then retrieve the value
LaravelRuntime::config()->file('app')->getOrFail('names');

// Without defining the file, use only the get method indicating the full path
LaravelRuntime::config()->getOrFail('name2');
```

### Retrieve Multiple Values

Thinking about not constantly using the GET method to obtain multiple values, with this query method, you can send the values you want to retrieve simultaneously.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// You can send an array or simply the values you require separated by commas.
LaravelRuntime::config()->getMany('app.name', 'cache.default');
LaravelRuntime::config()->getMany(['app.name', 'cache.default']);
```

### Validate Existence of Configuration Value

If it's essential to check if a configuration value exists, then this method makes it very easy.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// You can send the full route of the value to search for.
LaravelRuntime::config()->has('app.name');

// You can also define the file to search in.
LaravelRuntime::config()->file('app')->has('name');
```

### Validate Existence of Multiple Configuration Values

If you want to validate multiple configuration values, then this might be the method you need. Note that you CANNOT define the file to query here because using the full path of the value allows you to validate multiple files simultaneously.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// You can send an array or simply the full paths separated by commas.
LaravelRuntime::config()->hasMany('app.name', 'cache.default');
LaravelRuntime::config()->hasMany(['app.name', 'cache.default']);
```

### Change Configuration Value

This is very useful; you can change any configuration value at runtime by simply defining what you require. Need to change the database connection? Want to use a custom email for notifications? Well, in that case, this is the solution.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// You can send an array or simply the full paths separated by

 commas.
LaravelRuntime::config()->file('mail')->set('mailers.smtp.username', 'xxxx@xxxx.com');
LaravelRuntime::config()->file('mail')->set('mailers.smtp.password', 'xxxxxxx');

// You can also change values without defining the file to intervene.
LaravelRuntime::config()->set('app.name', 'CodeMaestro');
```

### Delete Configuration Value

Well, this is something only you know if you need. If you do, well, here it is, quick and easy.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// You can define the file to use if you wish; this property will be set to null while the script finishes.
LaravelRuntime::config()->file('app')->unset('name');
LaravelRuntime::config()->unset('app.name');
```

## Creator

- 🇨🇴 Raúl Mauricio Uñate Castro
- Email: raulmauriciounate@gmail.com

## License

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)