<?php

namespace App\Models;

use App\Models\Revista;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model {
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nombres',
		'apellidos',
		'telefonos',
		'correo_electronico',
		'grado',
	];

	// Definiendo la relación Muchos a Muchos entre los modelos Revista y Responsable
	public function revistas() {
		return $this->belongsToMany(Revista::class, 'responsables_revistas', 'id_responsable', 'id_revista')
			->withPivot(['orden', 'cargo'])
			->orderBy('orden', 'asc');
	}
}
