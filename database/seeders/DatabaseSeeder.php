<?php

namespace Database\Seeders;

use App\Models\Responsable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		//$revistas = Revista::factory(50)->create();
		$responsables = Responsable::factory(25)->create();
	}
}
