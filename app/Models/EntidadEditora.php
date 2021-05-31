<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntidadEditora extends Model {
	//use HasFactory;
	//
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nombre',
	];

	// Definiendo la relación Muchos a Muchos entre las tablas
	// entidad_editora y revistas
	public function revistas() {
		return $this->belongsToMany(Revista::class, 'entidad_editoras_revistas', 'id_entidad_editora', 'id_revista')->withPivot('orden');
	}
}
