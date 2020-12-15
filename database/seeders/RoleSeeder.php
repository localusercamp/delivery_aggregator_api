<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('role')->truncate();
    DB::table('role')->insert([
      ['title' => 'Администратор'],
      ['title' => 'Модератор'],
      ['title' => 'Поставщик'],
      ['title' => 'Клиент'],
    ]);
  }
}
