<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductOptionTypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('product_option_type')->truncate();
    DB::table('product_option_type')->insert([
      ['title' => 'IterativeProductOption'],
      ['title' => 'SelectiveProductOption'],
      ['title' => 'SwitchableProductOption'],
    ]);
  }
}
