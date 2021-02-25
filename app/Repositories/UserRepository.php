<?php

namespace App\Repositories;

use App\Models\{
  User,
  Role,
};
use App\Contracts\Repository;

final class UserRepository extends Repository
{
  /**
   * Создает пользователя с ролью `Role::MODERATOR`

   * @param string $phone Телефон
   * @param string $password Пароль
   */
  public static function storeModerator(string $phone, string $password) : User
  {
    return self::store($phone, $password, Role::MODERATOR);
  }

  /**
   * Создает пользователя с ролью `Role::PROVIDER`
   *
   * @param string $phone Телефон
   * @param string $password Пароль
   */
  public static function storeProvider(string $phone, string $password) : User
  {
    return self::store($phone, $password, Role::PROVIDER);
  }

  /**
   * Создает пользователя с ролью `Role::CLIENT`
   *
   * @param string $phone Телефон
   * @param string $password Пароль
   */
  public static function storeClient(string $phone, string $password) : User
  {
    return self::store($phone, $password, Role::CLIENT);
  }


  /**
   * Создает пользователя
   *
   * @param string $phone Телефон
   * @param string $password Пароль
   * @param string $role Роль пользователя
   */
  private static function store(string $phone, string $password, int $role) : User
  {
    $password = bcrypt($password);

    $user = new User();
    $user->phone    = $phone;
    $user->password = $password;
    $user->role_id  = $role;
    $user->city_id  = 1;
    $user->save();

    return $user;
  }
}
