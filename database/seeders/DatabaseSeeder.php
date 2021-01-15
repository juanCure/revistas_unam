<?php

namespace Database\Seeders;

use App\Models\Revista;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		$revistas = Revista::factory(50)->create();
	}
}
