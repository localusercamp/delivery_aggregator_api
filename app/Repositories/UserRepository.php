<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

final class UserRepository extends Repository
{
  /**
   * Создает пользователя из `$input['email']` и `$input['password']`
   */
  public static function storeSeller(array $input) : array
  {
    $email    = $input['email'];
    $password = bcrypt($input['password']);

    $user = User::create([
      'email'    => $email,
      'password' => $password,
    ]);

    return compact('user');
  }

  /**
   * Создает пользователя из `$input['phone']` и `$input['password']`
   */
  public static function storeBuyer(array $input) : array
  {
    $phone    = $input['phone'];
    $password = bcrypt($input['password']);

    $user = User::create([
      'phone'    => $phone,
      'password' => $password,
    ]);

    return compact('user');
  }
}
