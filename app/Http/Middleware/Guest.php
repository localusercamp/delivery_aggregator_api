<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Guest
{
  public function handle(Request $request, Closure $next)
  {
    if (auth()->user())
      return response()->json('You are signed in already', 403);
    return $next($request);
  }
}
