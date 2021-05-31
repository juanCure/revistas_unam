<?php

namespace Database\Factories;

use App\Models\Responsable;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResponsableFactory extends Factory {
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Responsable::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		return [
			'nombre' => $this->faker->firstName,
			'apellidos' => $this->faker->lastName,
			'telefonos' => $this->faker->phoneNumber,
			'email' => $this->faker->unique()->safeEmail,
		];
	}
}
