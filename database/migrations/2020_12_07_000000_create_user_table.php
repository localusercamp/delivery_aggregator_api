<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('user', function (Blueprint $table) {
      $table->id();
      $table->string('firstname')->nullable();
      $table->string('lastname')->nullable();
      $table->string('email')->unique()->nullable();
      $table->string('phone')->unique()->nullable();
      $table->string('password');
      $table->unsignedBigInteger('city_id')->nullable();
      $table->timestamp('verified_at')->nullable();
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('user');
  }
}
