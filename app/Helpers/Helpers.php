<?php


function act(string $ActionHeirClass, ...$argv)
{
  return App\Helpers\Actor::call($ActionHeirClass, ...$argv);
}

/**
 * Заполнение полей модели
 */
function fill_model(Illuminate\Database\Eloquent\Model &$model, array $fill) : void
{
  foreach ($fill as $field => $value)
  {
    $model->{$field} = $value;
  }
}
