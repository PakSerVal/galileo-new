<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('articles', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->text('title');
			$table->text('content');
			$table->bigInteger('thumb_image_id');
			$table->string('preview_text');
			$table->integer('priority')->default(0);
			$table->boolean('is_published')->default(false);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('articles');
	}
}
