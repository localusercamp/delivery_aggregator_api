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
      ['title' => 'Суши'],
      ['title' => 'Роллы'],
      ['title' => 'Пицца'],
      ['title' => 'Пельмени'],
    ]);
  }
}
