<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('category')->truncate();
    DB::table('category')->insert([
      [
        'id'    => 1,
        'title' => 'Сантехника',
      ], [
        'id'    => 2,
        'title' => 'Валонтерство',
      ],
    ]);
  }
}
