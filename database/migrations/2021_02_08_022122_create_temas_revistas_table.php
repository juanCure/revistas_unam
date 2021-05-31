<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemasRevistasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('temas_revistas', function (Blueprint $table) {
			$table->unsignedBigInteger('id_tema');
			$table->unsignedBigInteger('id_revista');
			$table->unsignedTinyInteger('orden');

			$table->foreign('id_tema')->references('id')->on('temas');
			$table->foreign('id_revista')->references('id_revista')->on('revistas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('temas_revistas');
	}
}
