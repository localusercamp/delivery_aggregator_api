<?php


function act(string $ActionHeirClass, ...$argv)
{
  return App\Helpers\Actor::call($ActionHeirClass, ...$argv);
}
