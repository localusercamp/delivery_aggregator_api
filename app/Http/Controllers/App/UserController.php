<?php

namespace App\Http\Controllers\App;

use App\Actions\User\SyncUserAction;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
  public function sync(Request $request)
  {
    $output = SyncUserAction::run();
    return response()->json($output);
  }
}
