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
			$table->text('description')->nullable();
			$table->string('image')->nullable();
			$table->string('code')->unique();
			$table->decimal('price', 8, 2)->unsigned()->default(0);
			$table->string('format')->nullable();
			$table->string('article')->nullable();
			$table->string('measure');
			$table->integer('count')->unsigned()->default(0);
      $table->bigInteger('views_count')->unsigned()->default(0);

			$table->foreignId('manufacturer_id')->nullable()->constrained();
			$table->foreignId('color_id')->nullable()->constrained();
			$table->foreignId('thickness_id')->nullable()->constrained();
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
