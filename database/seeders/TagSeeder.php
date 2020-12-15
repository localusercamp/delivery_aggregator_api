<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('tag')->truncate();
    DB::table('tag')->insert([
      ['title' => 'Японская кухня'],
      ['title' => 'Американская кухня'],
      ['title' => 'Пицца'],
      ['title' => 'Роллы'],
    ]);
  }
}
