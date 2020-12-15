<?php

namespace App\Repositories;

use App\Models\{
  User,
  Role,
};

final class UserRepository extends Repository
{
  public static function storeModerator(array $input) : array
  {
    $user = self::storeUser($input, Role::MODERATOR);

    return $user;
  }

  public static function storeProvider(array $input) : array
  {
    $user = self::storeUser($input, Role::PROVIDER);

    return $user;
  }

  public static function storeClient(array $input) : array
  {
    $user = self::storeUser($input, Role::CLIENT);

    return $user;
  }



  private static function storeUser(array $input, int $role) : array
  {
    $input['password'] = bcrypt($input['password']);
    $input['role_id']  = $role;
    $input['city_id']  = 1;

    $user = new User();
    fill_model($user, $input);
    $user->save();

    return compact('user');
  }
}
