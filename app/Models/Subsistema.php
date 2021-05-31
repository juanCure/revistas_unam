<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subsistema extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nombre',
	];

	public function revistas() {
		return $this->hasMany(Revista::class, 'id_subsistema');
	}
}
