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
      $table->string('title')->nullable();
      $table->string('description')->nullable();
      $table->unsignedMediumInteger('price')->nullable();
      $table->json('options')->nullable();
      $table->unsignedBigInteger('poster_id')->nullable();
      $table->unsignedBigInteger('company_id')->nullable();
      $table->unsignedBigInteger('creator_id')->nullable();
      $table->unsignedBigInteger('category_id')->nullable();
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
