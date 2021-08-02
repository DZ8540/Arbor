<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->id();
			$table->string('slug')->unique();
			$table->string('name');
			$table->text('description');
			$table->string('image');
			$table->string('code')->unique();
			$table->integer('price')->unsigned()->default(0);
			$table->string('format');
			$table->string('article');
			$table->integer('count')->unsigned()->default(0);

			$table->foreignId('manufacturer_id')->constrained();
			$table->foreignId('color_id')->constrained();
			$table->foreignId('thickness_id')->constrained();
			$table->foreignId('category_id')->constrained();

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
		Schema::dropIfExists('products');
	}
}
