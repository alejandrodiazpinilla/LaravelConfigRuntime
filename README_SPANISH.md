# PhpRunTime: Ajusta la configuración de PHP en tiempo de ejecución

La biblioteca `PhpRunTime` proporciona métodos para gestionar la configuración de PHP en tiempo de ejecución. Permite establecer, obtener y restaurar opciones de configuración, así como verificar su existencia y estado.

![RUNTIME_PHP](https://github.com/rmunate/PHPInfoServer/assets/91748598/873f40e0-9278-4a82-a50c-5baef7b7691a)

## Tabla de contenidos
1. [Instalación](#instalación)
2. [Métodos disponibles](#métodos-disponibles)
3. [Ejemplos de uso](#ejemplos-de-uso)
   - [Establecer una opción de configuración](#establecer-una-opción-de-configuración)
   - [Obtener el valor de una opción de configuración](#obtener-el-valor-de-una-opción-de-configuración)
   - [Restaurar una opción de configuración](#restaurar-una-opción-de-configuración)
   - [Restaurar todas las opciones de configuración](#restaurar-todas-las-opciones-de-configuración)
4. [Aclaraciones](#aclaraciones)
5. [Creador](#creador)
6. [Licencia](#licencia)

## Instalación
Para instalar el paquete a través de Composer, ejecuta el siguiente comando:

```shell
composer require rmunate/laravel-config-runtime
```

## Métodos disponibles

| Método | Descripción |
| - | - |
| `PhpRunTime::set($opcion, $valor)` | Establece el valor de una opción de configuración de PHP en tiempo de ejecución utilizando `ini_set()`. |
| `PhpRunTime::get($opcion)` | Obtiene el valor actual de una opción de configuración de PHP. Si la opción no está establecida o no se encuentra, devuelve `null`. |
| `PhpRunTime::restore($opcion)` | Restaura una opción de configuración de PHP a su valor predeterminado. Devuelve `true` si la restauración es exitosa, o `false` en caso contrario. |
| `PhpRunTime::restoreAll()` | Restaura todas las opciones de configuración de PHP a sus valores predeterminados. Devuelve `true` si todas las restauraciones son exitosas, o `false` en caso contrario. |
| `PhpRunTime::isOptionSet($opcion)` | Verifica si una opción de configuración está establecida y tiene un valor no vacío. Devuelve `true` si la opción está establecida, o `false` en caso contrario. |
| `PhpRunTime::doesOptionExist($opcion)` | Verifica si una opción de configuración existe en el archivo `php.ini`. Devuelve `true` si la opción existe, o `false` en caso contrario. |

## Ejemplos de uso

#### Establecer una opción de configuración

```php
use Rmunate\Server\PhpRunTime;

// Establecer la opción "display_errors" en "On"
PhpRunTime::set('display_errors', 'On');

// Verificar si la opción está establecida y tiene un valor no vacío
if (PhpRunTime::isOptionSet('display_errors')) {
    // 'La opción "display_errors" está habilitada.';
} else {
    // 'La opción "display_errors" no está establecida.';
}
```

#### Obtener el valor de una opción de configuración

```php
use Rmunate\Server\PhpRunTime;

// Obtener el valor actual de la opción "max_execution_time"
$maxExecutionTime = PhpRunTime::get('max_execution_time');

if ($maxExecutionTime !== null) {
    // "El valor actual de 'max_execution_time' es: $maxExecutionTime segundos.";
} else {
    // "La opción 'max_execution_time' no está establecida.";
}
```

#### Restaurar una opción de configuración

```php
use Rmunate\Server\PhpRunTime;

// Establecer temporalmente la opción "memory_limit" en "256M"
PhpRunTime::set('memory_limit', '256M');

// Restaurar la opción "memory_limit" a su valor predeterminado
PhpRunTime::restore('memory_limit');

// Verificar si la opción está establecida y tiene un valor no vacío
if (PhpRunTime::isOptionSet('memory_limit')) {
    // 'La opción "memory_limit" está establecida.';
} else {
    // 'La opción "memory_limit" no está establecida.';
}
```

#### Restaurar todas las opciones de configuración

```php
use Rmunate\Server\PhpRunTime;

// Establecer temporalmente algunas opciones de configuración
PhpRunTime::set('display_errors', 'On');
PhpRunTime::set('error_reporting', E_ALL);

// Restaurar todas las opciones a sus valores predeterminados
PhpRunTime::restoreAll();

// Verificar si las opciones están establecidas y tienen valores no vacíos
if (PhpRunTime::isOptionSet('display_errors') || PhpRunTime::isOptionSet('error_reporting')) {
    // 'Algunas opciones no pudieron ser restauradas.';
} else {
    // 'Todas las opciones se restauraron exitosamente.';
}
```

## Aclaraciones

- Los cambios realizados con el método `set()` solo son válidos durante la ejecución del script actual y no afectan el archivo `php.ini`. Para realizar cambios permanentes, es necesario editar manualmente el archivo `php.ini`.

- Algunas opciones de configuración pueden estar deshabilitadas en entornos de hosting compartido, lo que puede limitar la capacidad de cambiar ciertas configuraciones.

- Es importante tener precaución al modificar la configuración de PHP, ya que algunos cambios pueden afectar el rendimiento y la seguridad de las aplicaciones. Se recomienda consultar la documentación oficial de PHP para obtener información detallada sobre cada opción de configuración.

## Creador
- 🇨🇴 Raúl Mauricio Uñate Castro
- Email: raulmauriciounate@gmail.com

## Licencia
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
