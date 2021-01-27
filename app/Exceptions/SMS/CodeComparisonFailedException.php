<?php

namespace App\Exceptions\SMS;

use Exception;

class CodeComparisonFailedException extends Exception
{
  /**
   * Report the exception.
   *
   * @return void
   */
  public function report()
  {

  }

  /**
   * Render the exception into an HTTP response.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function render()
  {
    return response()->json('32', 422);
  }
}
