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
    return self::store($input, Role::MODERATOR);
  }

  public static function storeProvider(array $input) : array
  {
    return self::store($input, Role::PROVIDER);
  }

  public static function storeClient(array $input) : array
  {
    return self::store($input, Role::CLIENT);
  }



  private static function store(array $input, int $role) : array
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
