<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('company_type')->truncate();
    DB::table('company_type')->insert([
      [
        'tag' => 'cafe',
        'title' => 'Кафе'
      ], [
        'tag' => 'restaurant',
        'title' => 'Ресторан'
      ], [
        'tag' => 'pizzeria',
        'title' => 'Пиццерия'
      ],
    ]);
  }
}
