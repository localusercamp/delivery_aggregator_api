<?php

namespace App\Actions\Auth;

use App\Actions\Action;

class SignoutAction extends Action
{
  public static function run() : void
  {
    auth()->logout();
  }
}
