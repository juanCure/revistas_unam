<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevistasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('revistas', function (Blueprint $table) {
			$table->id('id_revista');
			$table->string('titulo');
			$table->string('descripcion');
			$table->unsignedInteger('anio_inicio')->nullable();
			$table->string('issn')->nullable();
			$table->string('issne')->nullable();
			$table->string('arbitrada')->default('Si');
			$table->string('imagen')->nullable();
			$table->string('ojs_ruta')->nullable();
			//$table->unsignedTinyInteger('id_situacion');
			$table->string('situacion');
			$table->unsignedTinyInteger('id_frecuencia');
			$table->unsignedTinyInteger('id_soporte');
			$table->unsignedTinyInteger('id_tipo_revista');
			$table->unsignedTinyInteger('id_area_conocimiento');
			$table->unsignedTinyInteger('id_subsistema');
			$table->string('otros_indices')->nullable();
			$table->string('editorial')->default('Universidad Nacional Autónoma de México');
			$table->timestamp('fecha_alta', $precision = 0);
			$table->timestamp('fecha_modificacion', $precision = 0);
			//$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('revistas');
	}
}
