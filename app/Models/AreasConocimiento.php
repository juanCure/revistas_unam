<?php

namespace App\Models;

use App\Models\Revista;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class AreasConocimiento extends Model {

	use Sortable;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'areas_conocimiento';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nombre',
	];

	public $sortable = [
		'nombre',
	];

	// Definiendo la relación 1 a M entre las tablas
	// areas_conocimiento 1 -> M revistas
	public function revistas() {
		return $this->hasMany(Revista::class, 'id_area_conocimiento');
	}
}
