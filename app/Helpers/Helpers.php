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

function codegen(int $n, string $alloc = null) : string
{
  return $n ? codegen(--$n, $alloc .= rand(0,9)) : $alloc;
}
