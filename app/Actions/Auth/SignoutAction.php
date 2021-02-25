<?php

namespace App\Actions\Auth;

use App\Contracts\Action;

class SignoutAction extends Action
{
  public static function run() : void
  {
    auth()->logout();
  }
}
