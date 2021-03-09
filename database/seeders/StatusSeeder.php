<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('status')->truncate();
    DB::table('status')->insert([
      [
        'tag' => 'draft',
        'title' => 'Черновик'
      ], [
        'tag' => 'review',
        'title' => 'На рассмотрении'
      ], [
        'tag' => 'approved',
        'title' => 'Одобрено'
      ],
    ]);
  }
}
