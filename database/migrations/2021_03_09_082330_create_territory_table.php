<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerritoryTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('territory', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('title_short');
      $table->string('geolocation');
      $table->unsignedTinyInteger('zoom');
      $table->unsignedTinyInteger('level');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('territory');
  }
}
