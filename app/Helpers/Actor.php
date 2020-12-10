<?php

namespace App\Helpers;

class Actor
{
  public static $namespace;

  /**
   * Вызывает Action.
   * Пример использования: `Action::call('SignupUserAction')`
   */
  public static function call(string $ActionHeirClass, ...$argv)
  {
    return static::namespaced($ActionHeirClass)::run(...$argv);
  }

  private static function namespaced(string $ActionHeirClass) : string
  {
    $namespace = static::$namespace;
    return "$namespace\\$ActionHeirClass";
  }
}
