<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $seeded = DB::table('user')->where('phone', '9999999999')->exists();
    if (!$seeded) {
      DB::table('user')->insert([
        [
          'password' => bcrypt('123456'),
          'phone' => '9999999999',
          'role_id' => 3,
          'city_id' => 1,
        ],
      ]);
    }
  }
}
