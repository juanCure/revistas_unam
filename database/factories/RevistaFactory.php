<?php

namespace Database\Factories;

use App\Models\Revista;
use Illuminate\Database\Eloquent\Factories\Factory;

class RevistaFactory extends Factory {
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Revista::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		return [
			'titulo' => $this->faker->sentence(3),
			'descripcion' => $this->faker->paragraph(1),
			'anio_inicio' => $this->faker->numberBetween($min = 2005, $max = 2015),
			'issn' => $this->faker->regexify('[0-9][0-9][0-9][0-9][-][0-9][0-9][0-9][0-9]'),
			'issne' => $this->faker->regexify('[0-9][0-9][0-9][0-9][-][0-9][0-9][0-9][X0-9]'),
			'arbitrada' => $this->faker->randomElement(['Si', 'No']),
			//'id_situacion' => $this->faker->numberBetween($min = 1, $max = 2),
			'situacion' => $this->faker->randomElement(['vigente', 'descontinuada']),
			'id_frecuencia' => $this->faker->numberBetween($min = 1, $max = 10),
			'id_soporte' => $this->faker->numberBetween($min = 1, $max = 10),
			'id_tipo_revista' => $this->faker->numberBetween($min = 1, $max = 10),
			'id_area_conocimiento' => $this->faker->numberBetween($min = 1, $max = 10),
			'id_subsistema' => $this->faker->numberBetween($min = 1, $max = 10),
			'otros_indices' => $this->faker->sentence(8),
			'editorial' => $this->faker->sentence(3),
		];
	}
}
