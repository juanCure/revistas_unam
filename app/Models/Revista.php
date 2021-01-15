<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revista extends Model {
	use HasFactory;
	//
	const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_modificacion';

	protected $primaryKey = 'id_revista';
	//
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'titulo',
		'descripcion',
		'anio_inicio',
		'issn',
		'issne',
		'arbitrada',
		'imagen',
		'ojs_ruta',
		'situacion',
		'id_frecuencia',
		'id_soporte',
		'id_tipo_revista',
		'id_area_conocimiento',
		'id_subsistema',
		'otros_indices',
		'editorial',
	];
}
