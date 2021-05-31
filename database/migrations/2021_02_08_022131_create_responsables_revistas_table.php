<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesRevistasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('responsables_revistas', function (Blueprint $table) {
			$table->unsignedBigInteger('id_responsable');
			$table->unsignedBigInteger('id_revista');
			$table->unsignedTinyInteger('orden');
			$table->string('cargo', 45);

			$table->foreign('id_responsable')->references('id')->on('responsables');
			$table->foreign('id_revista')->references('id_revista')->on('revistas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('responsables_revistas');
	}
}
