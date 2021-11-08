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
      $table->integer('side_a')->nullable();
      $table->integer('side_b')->nullable();
      $table->integer('side_c')->nullable();
      $table->integer('side_d')->nullable();
      $table->integer('count')->unsigned();

      $table->foreignId('product_id')->constrained()->onDelete('cascade');

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
