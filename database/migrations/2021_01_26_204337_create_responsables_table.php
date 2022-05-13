<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('responsables', function (Blueprint $table) {
			$table->id();
			$table->string('nombres', 45);
			$table->string('apellidos', 45);
			$table->string('telefonos', 45)->nullable();
			$table->string('correo_electronico')->nullable();
			$table->string('segundo_correo_electronico')->nullable();
			$table->string('grado', 10)->nullable();
			//$table->timestamps();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('responsables');
	}
}
