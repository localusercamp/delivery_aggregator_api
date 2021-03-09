<?php

namespace App\Actions\User;

use App\Contracts\Action;
use App\Tasks\GetCurrentUserTask;

final class SyncUserAction extends Action
{
  /**
   * Возвращает пользователя для синхронизации
   */
  public static function run() : array
  {
    $user = GetCurrentUserTask::run(['company']);
    return compact('user');
  }
}
