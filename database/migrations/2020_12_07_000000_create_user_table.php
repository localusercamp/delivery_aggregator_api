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
      $table->string('phone', 10)->unique()->nullable();
      $table->string('password');
      $table->unsignedBigInteger('role_id')->nullable();
      $table->unsignedBigInteger('city_id')->nullable();
      $table->rememberToken();
      $table->timestamp('verified_at')->nullable();
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
