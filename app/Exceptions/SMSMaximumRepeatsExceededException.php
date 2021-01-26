<?php

namespace App\Exceptions;

use Exception;

class SMSMaximumRepeatsExceededException extends Exception
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
    return response()->json(['error' => 'Превышено число сообщений для отправки на этот номер телефона, попробуйте позже.'], 422);
  }
}
