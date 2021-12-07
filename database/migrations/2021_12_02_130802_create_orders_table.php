<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->boolean('payer_type');
      $table->string('name');
      $table->string('email');
      $table->string('phone');

      // Entity
      $table->string('location')->nullable();
      $table->bigInteger('index')->unsigned()->nullable();
      $table->string('company_name')->nullable();
      $table->string('address')->nullable();
      $table->bigInteger('individual_tax_number')->unsigned()->nullable();
      $table->bigInteger('reason_code')->unsigned()->nullable();
      // Entity

      $table->string('comment')->nullable();

      $table->string('delivery_type');
      $table->string('delivery_address')->nullable();
      $table->string('delivery_comment')->nullable();

      $table->string('pay_type');
      
      $table->integer('package_count')->unsigned();
      $table->integer('price')->unsigned();

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
    Schema::dropIfExists('orders');
  }
}
