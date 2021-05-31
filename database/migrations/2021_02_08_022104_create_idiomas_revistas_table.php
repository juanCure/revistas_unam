<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdiomasRevistasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('idiomas_revistas', function (Blueprint $table) {
			$table->unsignedBigInteger('id_idioma');
			$table->unsignedBigInteger('id_revista');
			$table->unsignedBigInteger('orden');

			$table->foreign('id_idioma')->references('id')->on('idiomas');
			$table->foreign('id_revista')->references('id_revista')->on('revistas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('idiomas_revistas');
	}
}
