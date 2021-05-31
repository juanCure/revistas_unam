<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadEditorasRevistasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('entidad_editoras_revistas', function (Blueprint $table) {
			$table->unsignedBigInteger('id_entidad_editora');
			$table->unsignedBigInteger('id_revista');
			$table->unsignedTinyInteger('orden');

			$table->foreign('id_entidad_editora')->references('id')->on('entidad_editoras');
			$table->foreign('id_revista')->references('id_revista')->on('revistas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('entidad_editoras_revistas');
	}
}
