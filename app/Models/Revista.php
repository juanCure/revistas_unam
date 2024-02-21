<?php

namespace App\Models;

use App\Models\AreasConocimiento;
use App\Models\Editorial;
use App\Models\Responsable;
use App\Models\SistemaIndexador;
use App\Models\Tema;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Revista extends Model {
	use HasFactory;
	use Sortable;
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
		'soporte',
		'situacion',
		'tipo_revista',
		'otros_indices',
		'imagen',
		'ojs_ruta',
		'ruta_alterna',
		'id_frecuencia',
		'id_area_conocimiento',
		'id_subsistema',
		'indicador',
	];

	public $sortable = [
		'titulo',
		'tipo_revista',
	];

	// Definiendo la relación 1 a M entre las tablas
	// revistas 1->1 areas_conocimiento
	//
	public function area_conocimiento() {
		return $this->belongsTo(AreasConocimiento::class, 'id_area_conocimiento');
	}
	// Definiendo la relación 1 a M entre las tablas
	// revistas -> areas_conocimiento
	//
	public function frecuencia() {
		return $this->belongsTo(Frecuencia::class, 'id_frecuencia');
	}
	// Definiendo la relación 1 a M entre las tablas
	// revistas -> areas_conocimiento
	//
	public function subsistema() {
		return $this->belongsTo(Subsistema::class, 'id_subsistema');
	}

	// Definiendo la relación Muchos a Muchos entre las tablas
	// revistas y editoriales
	public function editoriales() {
		return $this->belongsToMany(Editorial::class, 'editoriales_revistas', 'id_revista', 'id_editorial')
			->withPivot('orden')
			->orderBy('orden', 'asc');
	}

	// Definiendo la relación Muchos a Muchos entre las tablas
	// revistas y entidades
	public function entidades_editoras() {
		return $this->belongsToMany(EntidadEditora::class, 'entidad_editoras_revistas', 'id_revista', 'id_entidad_editora')
			->withPivot('orden')
			->orderBy('orden', 'asc');
	}

	// Definiendo la relación Muchos a Muchos entre las tablas
	// revistas e idiomas
	public function idiomas() {
		return $this->belongsToMany(Idioma::class, 'idiomas_revistas', 'id_revista', 'id_idioma')
			->withPivot('orden')
			->orderBy('orden', 'asc');
	}

	// Definiendo la relación Muchos a Muchos entre las tablas
	// revistas e idiomas
	public function temas() {
		return $this->belongsToMany(Tema::class, 'temas_revistas', 'id_revista', 'id_tema')
			->withPivot('orden')
			->orderBy('orden', 'asc');
	}

	// Definiendo la relación Muchos a Muchos entre los modelos Revistas y SistemasIndexador
	public function sistemas_indexadores() {
		return $this->belongsToMany(SistemaIndexador::class, 'indezadores_revistas', 'id_revista', 'id_sistema')
			->withPivot('orden')
			->orderBy('orden', 'asc');
	}

	// Definiendo la relación Muchos a Muchos entre los modelos Revista y Responsable
	public function responsables() {
		return $this->belongsToMany(Responsable::class, 'responsables_revistas', 'id_revista', 'id_responsable')
			->withPivot(['orden', 'cargo'])
			->orderBy('orden', 'asc');
	}

	/**
	 * Scope a query to only include Revistas arbitradas.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeArbitrada($query) {
		return $query->where('arbitrada', 'Si')->orderBy('titulo', 'asc');
	}

	/**
	 * Scope a query to only include Revistas arbitradas.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeVigente($query) {
		return $query->where("situacion", "Vigente")->orderBy('titulo', 'asc');
	}
}
