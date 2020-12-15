<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('city')->truncate();
      DB::table('city')->insert([
        ['title' => 'Ханты-Мансийск']
      ]);
    }
}
