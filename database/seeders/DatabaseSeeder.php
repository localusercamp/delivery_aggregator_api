<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      CitySeeder::class,
      RoleSeeder::class,
      UserSeeder::class,
      CategorySeeder::class,
      ProductOptionTypeSeeder::class,
      TagSeeder::class,
      CompanyTypeSeeder::class,
      StatusSeeder::class,
      TerritorySeeder::class,
    ]);
  }
}
