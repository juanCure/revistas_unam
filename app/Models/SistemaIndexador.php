<?php

namespace App\Models;

use App\Models\Revista;
use Illuminate\Database\Eloquent\Model;

class SistemaIndexador extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'sistemas_indexadores';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nombre',
		'descripcion',
		'url',
	];

	// Definiendo la relación Muchos a Muchos entre los modelos
	//  SistemaIndexador y Revista
	public function revistas() {
		return $this->belongsToMany(Revista::class, 'indezadores_revistas', 'id_sistema', 'id_revista')->withPivot('orden');
	}
}
