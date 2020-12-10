<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('post')->truncate();
      DB::table('post')->insert([
        [
          'id'    => 1,
          'title' => 'Иванов',
          'description' => 'Описание иванова и тд и тп',
          'phone' => '1234567890',
          'user_id' => 1,
          'category_id' => 1,
        ],
        [
          'id'    => 2,
          'title' => 'Волонтернов',
          'description' => 'Описание волонтерова и тд и тп',
          'phone' => '1234567890',
          'user_id' => 2,
          'category_id' => 1,
        ],
        [
          'id'    => 3,
          'title' => 'Кротов',
          'description' => 'Описание Кротова и тд и тп',
          'phone' => '1234567890',
          'user_id' => 3,
          'category_id' => 1,
        ],

        [
          'id'    => 4,
          'title' => 'Иванов',
          'description' => 'Описание иванова и тд и тп',
          'phone' => '1234567890',
          'user_id' => 1,
          'category_id' => 2,
        ],
        [
          'id'    => 5,
          'title' => 'Волонтернов',
          'description' => 'Описание волонтерова и тд и тп',
          'phone' => '1234567890',
          'user_id' => 2,
          'category_id' => 2,
        ],
        [
          'id'    => 6,
          'title' => 'Кротов',
          'description' => 'Описание Кротова и тд и тп',
          'phone' => '1234567890',
          'user_id' => 3,
          'category_id' => 2,
        ],
      ]);
    }
}
