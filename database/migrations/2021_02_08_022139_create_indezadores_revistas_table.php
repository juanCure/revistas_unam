<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndezadoresRevistasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('indezadores_revistas', function (Blueprint $table) {
			$table->unsignedBigInteger('id_sistema');
			$table->unsignedBigInteger('id_revista');
			$table->unsignedBigInteger('orden');

			$table->foreign('id_sistema')->references('id')->on('sistemas_indexadores');
			$table->foreign('id_revista')->references('id_revista')->on('revistas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('indezadores_revistas');
	}
}
