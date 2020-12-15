<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('product', function (Blueprint $table) {
      $table->id();
      $table->unsignedMediumInteger('default_price');
      $table->unsignedBigInteger('company_id');
      $table->unsignedBigInteger('creator_id');
      $table->unsignedBigInteger('category_id');
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
    Schema::dropIfExists('product');
  }
}
