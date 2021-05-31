<?php

namespace App\Models;

use App\Models\Revista;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model {
	//use HasFactory;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'editoriales';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nombre',
	];

	// Definiendo la relación Muchos a Muchos entre las tablas
	// revistas y editoriales
	public function revistas() {
		return $this->belongsToMany(Revista::class, 'editorial_revista', 'id_editorial', 'id_revista')->withPivot('orden');
	}
}
