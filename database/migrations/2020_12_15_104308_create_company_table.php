<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('company', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('address');
      $table->string('inn');
      $table->string('website')->nullable();
      $table->string('head');
      $table->string('head_post');
      $table->unsignedBigInteger('owner_id');
      $table->unsignedTinyInteger('type_id');
      $table->unsignedTinyInteger('status_id');
      $table->unsignedTinyInteger('territory_id');
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
    Schema::dropIfExists('company');
  }
}
