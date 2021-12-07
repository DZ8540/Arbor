<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('services', function (Blueprint $table) {
      $table->id();
      $table->integer('side_a')->unsigned()->nullable();
      $table->integer('side_b')->unsigned()->nullable();
      $table->integer('side_c')->unsigned()->nullable();
      $table->integer('side_d')->unsigned()->nullable();
      $table->integer('count')->unsigned();
      $table->unsignedBigInteger('order_product_id');

      $table->foreign('order_product_id')->references('id')->on('order_product');

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
    Schema::dropIfExists('services');
  }
}
