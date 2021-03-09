<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TerritorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('territory')->truncate();
    DB::table('territory')->insert([
      [
        'title'       => 'Ханты-Мансийск',
        'title_short' => 'Ханты-Мансийск',
        'geolocation' => '[61.0042, 69.0019]',
        'zoom'        => 13,
        'level'       => 3,
      ], [
        'title'       => 'Сургут',
        'title_short' => 'Сургут',
        'geolocation' => '[61.2539773, 73.3961726]',
        'zoom'        => 13,
        'level'       => 3,
      ], [
        'title'       => 'Лангепас',
        'title_short' => 'Лангепас',
        'geolocation' => '[61.2536667, 75.1807905]',
        'zoom'        => 13,
        'level'       => 3,
      ], [
        'title'       => 'Мегион',
        'title_short' => 'Мегион',
        'geolocation' => '[61.0318946, 76.1024772]',
        'zoom'        => 13,
        'level'       => 3,
      ],[
        'title'       => 'Нижневартовск',
        'title_short' => 'Нижневартовск',
        'geolocation' => '[60.9397379, 76.5696206]',
        'zoom'        => 13,
        'level'       => 3,
      ], [
        'title'       => 'Нефтеюганск',
        'title_short' => 'Нефтеюганск',
        'geolocation' => '[61.0882837, 72.6164185]',
        'zoom'        => 13,
        'level'       => 3,
      ], [
        'title'       => 'Нягань',
        'title_short' => 'Нягань',
        'geolocation' => '[62.1454839, 65.3944361]',
        'zoom'        => 13,
        'level'       => 3,
      ], [
        'title'       => 'Когалым',
        'title_short' => 'Когалым',
        'geolocation' => '[62.2638914, 74.4828687]',
        'zoom'        => 13,
        'level'       => 3,
      ], [
        'title'       => 'Покачи',
        'title_short' => 'Покачи',
        'geolocation' => '[61.7421977, 75.5942069]',
        'zoom'        => 13,
        'level'       => 3,
      ], [
        'title'       => 'Пыть-Ях',
        'title_short' => 'Пыть-Ях',
        'geolocation' => '[60.7585769, 72.8366445]',
        'zoom'        => 13,
        'level'       => 3,
      ], [
        'title'       => 'Радужный',
        'title_short' => 'Радужный',
        'geolocation' => '[62.1343067, 77.4584346]',
        'zoom'        => 13,
        'level'       => 3,
      ], [
        'title'       => 'Урай',
        'title_short' => 'Урай',
        'geolocation' => '[60.1295842, 64.8040117]',
        'zoom'        => 13,
        'level'       => 3,
      ], [
        'title'       => 'Югорск',
        'title_short' => 'Югорск',
        'geolocation' => '[61.3124504, 63.3364787]',
        'zoom'        => 13,
        'level'       => 3,
      ], [
        'title'       => 'Белоярский район',
        'title_short' => 'Белоярский р.',
        'geolocation' => '[63.43, 66.40]',
        'zoom'        => 9,
        'level'       => 3,
      ], [
        'title'       => 'Березовский район',
        'title_short' => 'Березовский р.',
        'geolocation' => '[63.56, 65.03]',
        'zoom'        => 9,
        'level'       => 3,
      ], [
        'title'       => 'Сургутский район',
        'title_short' => 'Сургутский р.',
        'geolocation' => '[61.04, 73.24]',
        'zoom'        => 9,
        'level'       => 3,
      ], [
        'title'       => 'Кондинский район',
        'title_short' => 'Кондинский р.',
        'geolocation' => '[59.36, 65.56]',
        'zoom'        => 9,
        'level'       => 3,
      ], [
        'title'       => 'Нефтеюганский район',
        'title_short' => 'Нефтеюганский р.',
        'geolocation' => '[61.06, 72.36]',
        'zoom'        => 9,
        'level'       => 3,
      ], [
        'title'       => 'Нижневартовский район',
        'title_short' => 'Нижневартовский р.',
        'geolocation' => '[60.57, 76.33]',
        'zoom'        => 9,
        'level'       => 3,
      ], [
        'title'       => 'Октябрьский район',
        'title_short' => 'Октябрьский р.',
        'geolocation' => '[62.27, 66.03]',
        'zoom'        => 9,
        'level'       => 3,
      ], [
        'title'       => 'Советский район',
        'title_short' => 'Советский р.',
        'geolocation' => '[61.22, 63.34]',
        'zoom'        => 9,
        'level'       => 3,
      ], [
        'title'       => 'Ханты-Мансийский район',
        'title_short' => 'Ханты-Мансийский р.',
        'geolocation' => '[61.00, 69.00]',
        'zoom'        => 9,
        'level'       => 3,
      ],
    ]);
  }
}
