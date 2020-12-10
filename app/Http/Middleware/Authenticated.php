<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticated
{
  public function handle(Request $request, Closure $next)
  {
    if (!auth()->user())
      return response()->json('You are not signed in', 403);
    return $next($request);
  }
}
