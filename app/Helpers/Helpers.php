<?php

/**
 * Проверяет может ли массив быть передан в `sync()`
 *
 * @param array $array Массив для проверки
 */
function is_syncable(array $array) : bool
{
  foreach ($array as $item) {
    if (!is_int($item)) return false;
  }
  return true;
}

/**
 * Генерирует `$n`-значный рандомный код
 *
 * @param int $n Число знаков в коде
 */
function codegen(int $n, string $alloc = null) : string
{
  return $n ? codegen(--$n, $alloc .= rand(0,9)) : $alloc;
}

/**
 * Проверяет есть ли ключ в массиве и если есть возвращает его, если нет то возвращает null
 *
 * @param array $array Массив
 * @param string $key Ключ массива
 */
function have(array $array, string $key)
{
  return isset($array[$key]) ? $array[$key] : null;
}
