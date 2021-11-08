<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutCompanyTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('about_company', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->text('description')->nullable();
      $table->time('work_start')->nullable();
      $table->time('work_end')->nullable();
      $table->string('email')->nullable();
      $table->string('phone')->nullable();
      $table->string('logo')->nullable();
      $table->string('address')->nullable();
      $table->string('vk')->nullable();
      $table->string('facebook')->nullable();
      $table->string('instagram')->nullable();
      $table->string('telegram')->nullable();
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
    Schema::dropIfExists('about_company');
  }
}