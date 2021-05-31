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
			//$table->string('descripcion');
			$table->longText('descripcion')->nullable();
			$table->unsignedInteger('anio_inicio');
			$table->string('issn')->nullable();
			$table->string('issne')->nullable();
			$table->string('arbitrada')->default('Si');
			$table->string('soporte');
			$table->string('situacion');
			$table->string('tipo_revista');
			$table->string('imagen')->nullable();
			$table->string('ojs_ruta')->nullable();
			$table->unsignedBigInteger('id_frecuencia');
			$table->unsignedBigInteger('id_area_conocimiento');
			$table->unsignedBigInteger('id_subsistema');
			$table->string('otros_indices')->nullable();
			$table->longText('indicador')->nullable();
			$table->timestamp('fecha_alta', $precision = 0)->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('fecha_modificacion', $precision = 0)->default(DB::raw('CURRENT_TIMESTAMP'));
			//$table->timestamps();

			$table->foreign('id_area_conocimiento')->references('id')->on('areas_conocimiento');
			$table->foreign('id_frecuencia')->references('id')->on('frecuencias');
			$table->foreign('id_subsistema')->references('id')->on('subsistemas');
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
