<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nombre',
	];

	// Definiendo la relación Muchos a Muchos entre las tablas
	// revistas e idiomas
	public function revistas() {
		return $this->belongsToMany(Revista::class, 'temas_revistas', 'id_tema', 'id_revista')->withPivot('orden');
	}
}
