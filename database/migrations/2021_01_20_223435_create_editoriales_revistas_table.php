<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorialesRevistasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('editoriales_revistas', function (Blueprint $table) {
			$table->bigInteger('id_editorial')->unsigned();
			$table->bigInteger('id_revista')->unsigned();
			$table->unsignedTinyInteger('orden');

			$table->foreign('id_editorial')->references('id')->on('editoriales');
			$table->foreign('id_revista')->references('id_revista')->on('revistas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('editoriales_revistas');
	}
}
