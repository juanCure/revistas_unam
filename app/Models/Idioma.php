<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model {
	//use HasFactory;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nombre',
	];

	// Definiendo la relación Muchos a Muchos entre las tablas
	// idiomas y revistas
	public function revistas() {
		return $this->belongsToMany(Revista::class, 'idiomas_revistas', 'id_idioma', 'id_revista')->withPivot('orden');
	}
}
