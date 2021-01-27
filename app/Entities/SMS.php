<?php

namespace App\Entities;

use App\Exceptions\SMS\ValidationFailedException;
use Illuminate\Support\Facades\Hash;

class SMS
{
  public string $phone;
  public string $message;
  public ?string $code;
  public int $repeat;

  function __construct(string $phone, string $message, ?string $code = null)
  {
    $this->phone   = $phone;
    $this->message = $message;
    $this->code    = $code;
    $this->repeat  = 0;
  }

  function __serialize()
  {
    return [
      'phone'   => $this->phone,
      'code'    => bcrypt($this->code),
      'repeat'  => $this->repeat,
    ];
  }

  function __unserialize(array $data)
  {
    $this->phone  = $data['phone'];
    $this->code   = $data['code'];
    $this->repeat = $data['repeat'];
  }

  function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
    else if ($property === 'full_phone') {
      return '7' . $this->phone;
    }
  }



  public function validate(string ...$fields)
  {
    foreach ($fields as $field) {
      if (!$this->{$field})
        throw new ValidationFailedException();
    }
  }

  public function verifyCode(string $code) : bool
  {
    $this->validate('code');
    return Hash::check($code, $this->code);
  }
}
