# LaravelRuntime: Configura Laravel sobre la marcha!

La librería `LaravelRuntime` te permite modificar los valores de configuración de Laravel en tiempo de ejecución. Es importante tener en cuenta que estos cambios no afectarán los valores en el archivo `.env`, sino que solo se aplicarán mientras ejecutas los scripts. Ahora podrás definir cada script con qué características trabajará, qué base de datos usar, métodos de cache, ajustes de autenticación, correo electrónico a usar y todas las demás opciones.

⚙️ Esta librería es compatible con versiones de Laravel 8.0 y superiores ⚙️

[![Laravel 8.0+](https://img.shields.io/badge/Laravel-8.0%2B-orange.svg)](https://laravel.com)
[![Laravel 9.0+](https://img.shields.io/badge/Laravel-9.0%2B-orange.svg)](https://laravel.com)
[![Laravel 10.0+](https://img.shields.io/badge/Laravel-10.0%2B-orange.svg)](https://laravel.com)

![RUNTIME_LARAVEL](https://github.com/rmunate/PHPInfoServer/assets/91748598/b3f78d8b-9f01-4c81-8d08-a0f86791c4f9)

A continuación, te mostraremos varios ejemplos posibles para que puedas identificar las amplias facilidades de uso.

## Tabla de Contenido

1. [Instalación](#instalación)
2. [Métodos Disponibles](#métodos-disponibles)
    - [Obtener todos los datos de configuración](#obtener-todos-los-datos-de-configuración)
    - [Obtener la configuración de un archivo específico](#obtener-la-configuración-de-un-archivo-específico)
    - [Formas de consultar valores](#formas-de-consultar-valores)
    - [Generar Excepción De No Poderse Consultar](#generar-excepción-de-no-poderse-consultar)
    - [Obtener Varios Valores](#obtener-varios-valores)
    - [Validar que un valor de configuración exista](#validar-que-un-valor-de-configuración-exista)
    - [Validar que varios valores de configuración existan](#validar-que-varios-valores-de-configuración-existan)
    - [Cambiar un valor de configuración](#cambiar-un-valor-de-configuración)
    - [Eliminar un valor de configuración](#eliminar-un-valor-de-configuración)
3. [Creador](#creador)
4. [Licencia](#licencia)

## Instalación

Para instalar el paquete a través de Composer, ejecuta el siguiente comando:

```shell
composer require rmunate/laravel-config-runtime
```

## Métodos Disponibles

A continuación te mostraremos los posibles usos de la biblioteca. Es muy fácil y demasiado flexible, para que domines la configuración de Laravel con facilidad.

### Obtener todos los datos de configuración

Si deseas obtener todos los datos de configuración actual en un arreglo asociativo, podrás hacerlo fácilmente de la siguiente manera:

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// Método principal
LaravelRuntime::config()->all();

// Alias del método anterior
LaravelRuntime::config()->get();
```

### Obtener la configuración de un archivo específico

Recuerda que Laravel trae una carpeta con el nombre "config" donde se encuentran los diferentes archivos de configuración. Este paquete te facilita definir cuál de estos archivos de configuración consultar.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// Obtendrás el estado completo de configuración del archivo definido
LaravelRuntime::config()->file('app')->get();
```

### Formas de consultar valores

Ahora, si deseas conocer un valor específico de la configuración actual de Laravel en tiempo de ejecución, podrás usar cualquiera de las siguientes formas:

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// Definiendo el archivo y luego el valor a obtener
LaravelRuntime::config()->file('app')->get('name');

// Sin definir el archivo, usando solo el método get indicando la ruta completa
LaravelRuntime::config()->get('app.name');
```

### Generar Excepción De No Poderse Consultar

Si lo requieres, podrás lanzar una excepción al tratar de consultar un valor inexistente en la configuración del marco.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// Definiendo el archivo y luego el valor a obtener
LaravelRuntime::config()->file('app')->getOrFail('names');

// Sin definir el archivo, usando solo el método get indicando la ruta completa
LaravelRuntime::config()->getOrFail('name2');
```

### Obtener Varios Valores

Pensando en que no estés usando constantemente el método GET para obtener varios valores, con esta forma de consulta podrás enviar los valores que desees para consulta simultánea.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// Puedes enviar un arreglo o simplemente los valores que requieres separados por una coma.
LaravelRuntime::config()->getMany('app.name', 'cache.default');
LaravelRuntime::config()->getMany(['app.name', 'cache.default']);
```

### Validar que un valor de configuración exista

Si es indispensable consultar si un valor de configuración existe, entonces con este método será muy fácil.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// Puedes enviar la ruta completa del valor a buscar
LaravelRuntime::config()->has('app.name');

// También puedes definir el archivo a buscar.
LaravelRuntime::config()->file('app')->has('name');
```

### Validar que varios valores de configuración existan

Si quieres validar varios valores de configuración, este puede ser el método que requieres. Algo importante es que aquí NO podrás definir el archivo a consultar, esto se debe a que con la ruta completa del valor podrías validar varios archivos simultáneamente.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// Puedes enviar un arreglo o simplemente las rutas completas separadas por coma.
LaravelRuntime::config()->hasMany('app.name', 'cache.default');
LaravelRuntime::config()->hasMany(['app.name', 'cache.default']);
```

### Cambiar un valor de configuración

Esto sí que es útil. Puedes cambiar cualquier valor de configuración en tiempo de ejecución, simplemente define lo que requieres. ¿Necesitas cambiar la conexión a la base de datos? ¿Requieres usar un correo personalizado para notificaciones? Bueno, en ese caso, esta es la solución.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// Puedes enviar un arreglo o simplemente las rutas completas separadas por coma.
LaravelRuntime::config()->file('mail')->set('mailers.smtp.username', 'xxxx@xxxx.com');
LaravelRuntime::config()->file('mail')->set('mailers.smtp.password', 'xxxxxxx');

// También puedes cambiar valores sin necesidad de definir el archivo a intervenir.
LaravelRuntime::config()->set('app.name', 'CodeMaestro');
```

### Eliminar un valor de configuración

Bueno, esto es algo que solo tú sabes

. Si lo requieres, aquí lo tienes, rápido y fácil.

```php
use Rmunate\LaravelConfigRuntime\LaravelRuntime;

// Puedes definir el archivo a usar si así lo deseas, simplemente esta propiedad quedará como nula mientras termina el script.
LaravelRuntime::config()->file('app')->unset('name');
LaravelRuntime::config()->unset('app.name');
```

## Creador

- 🇨🇴 Raúl Mauricio Uñate Castro
- Correo electrónico: raulmauriciounate@gmail.com

## Licencia

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)