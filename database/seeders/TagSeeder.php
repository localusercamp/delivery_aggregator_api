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
      ['title' => 'Замена прокладки',   'category_id' => 1],
      ['title' => 'Установка',          'category_id' => 1],
      ['title' => 'Подключение',        'category_id' => 1],
      ['title' => 'Ремонт',             'category_id' => 1],
      ['title' => 'Устранение протечки','category_id' => 1],

      ['title' => 'Доставка',            'category_id' => 2],
      ['title' => 'Помощь по дому',      'category_id' => 2],
      ['title' => 'Услуги для животных', 'category_id' => 2],
      ['title' => 'Ремонт',              'category_id' => 2],
      ['title' => 'Помощь с почтой',     'category_id' => 2],
    ]);
  }
}
